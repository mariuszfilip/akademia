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
                        'mapped' => false,
                        'required' => true,
                        'label' => $consent->getName(),
                        'attr' => ['id' => $consent->getId(), 'class' => 'form-control']
                    ]);
        }


        $formNewProposal->handleRequest($request);

        if ($formNewProposal->isSubmitted() && $formNewProposal->isValid()) {
            $proposal = $formNewProposal->getData();

            /** @var \Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $proposal->getPhoto();

            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            $file->move(
                $this->getParameter('zdjecia_directory'),
                $fileName
            );

            $proposal->setPhoto($fileName);

            $em->persist($proposal);
            $em->flush();
            $id = $proposal->getId();

            foreach ($consents as $consent) {
                $proposalConsent = new ProposalConsent();
                $proposalConsent->setConsent($consent);
                $proposalConsent->setProposal($proposal);
                $proposalConsent->setIsChecked(true);
                var_dump($proposalConsent);
                $em->persist($proposalConsent);
            }
            $em->flush();

            return $this->redirectToRoute('dziekujemy', array('proposal_id' => $id));
        }

        return $this->render('proposals/new.html.twig', [
            'formNewProposal' => $formNewProposal->createView()
        ]);


    }

    /**
     * @Route("/dziekujemy/proposal_id/{proposal_id}", name="dziekujemy")
     */
    public function dziekujemyAction($proposal_id)
    {
        $em = $this->getDoctrine()->getManager();
        $proposal = $em->getRepository('AppBundle:Proposal')->findOneBy(['id' => $proposal_id]);

        return $this->render('proposals/dziekujemy.html.twig', [
            'proposal' => $proposal

        ]);
    }


}