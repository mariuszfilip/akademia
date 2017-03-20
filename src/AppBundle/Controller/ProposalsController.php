<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use AppBundle\Form\NewProposalFormType;

class ProposalsController extends Controller
{
    /**
     * @Route("/new", name="new_proposal")
     */
    public function newAction(Request $request)
    {
/*
        $choices = array(
            'choices' => array(
                'Maybe' => null,
                'Yes' => true,
                'No' => false,
            ),
        );

        $formNewProposal = $this->createFormBuilder()
            ->add('imie', TextType::Class)
            ->add('nazwisko', TextType::Class)
            ->add('wybor', ChoiceType::class, $choices)
            ->add('data_urodzenia', DateType::class, array('widget' => 'single_text')
            )->getForm();
*/

        $formNewProposal = $this->createForm(NewProposalFormType::class);
        $formNewProposal->handleRequest($request);

        if ($formNewProposal->isSubmitted() && $formNewProposal->isValid()) {
            $proposal = $formNewProposal->getData();

            /*
            dump($proposal);
            die();
            */

            $em = $this->getDoctrine()->getManager();
            $em->persist($proposal);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('proposals/new.html.twig', [
            'formNewProposal' => $formNewProposal->createView()
        ]);


    }



}