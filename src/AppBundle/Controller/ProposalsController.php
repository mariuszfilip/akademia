<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Consent;
use AppBundle\Entity\ProposalConsent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
        $em = $this->getDoctrine()->getManager();

        $formNewProposal = $this->createForm(NewProposalFormType::class);

        /**
         * @var Consent[] $consents
         * TODO
         */
        $consents = $em->getRepository(Consent::class)->findAll();
        foreach ($consents as $consent) {
            $formNewProposal
                ->add($consent->getFieldName(), CheckboxType::class,
                    [
//                        'data_class' => ProposalConsent::class,
                        'required'=>false,
                        'label' => $consent->getName(),
                        'attr' => ['id' => $consent->getId(), 'class' => 'form-control']
                    ]);
        }


        $formNewProposal->handleRequest($request);

        if ($formNewProposal->isSubmitted() && $formNewProposal->isValid()) {
            $proposal = $formNewProposal->getData();
            $em->persist($proposal);
            $em->flush();

            foreach ($consents as $consent) {
                $proposalConsent = new ProposalConsent();
                $proposalConsent->setConsentId($consent->getId());
                $proposalConsent->setProposalId($proposal->getId());
                $proposalConsent->setIsChecked(true);
                $em->persist($proposalConsent);
            }
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('proposals/new.html.twig', [
            'formNewProposal' => $formNewProposal->createView()
        ]);


    }


}