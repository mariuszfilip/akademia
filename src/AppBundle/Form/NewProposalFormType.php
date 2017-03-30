<?php

namespace AppBundle\Form;

use Symfony\Component\Translation\Loader\ArrayLoader;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NewProposalFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $trans = new Translator("pl_PL");
        $trans->addLoader('array', new ArrayLoader());
        $trans->addResource('array', array(
            'fields.loan_amount' => 'Kwota kredytu',
        ), 'pl_PL');

        $builder
            ->add('loan_amount', RangeType::class, ['label' => $trans->trans('fields.loan_amount'), 'attr' => ['value' => 1000, 'min' => 1000, 'max' => 12000, 'class' => 'form-control']])
            ->add('loan_duration', RangeType::class, ['label' => 'Okres kredytowania', 'attr' => ['value' => 6, 'min' => 6, 'max' => 24, 'class' => 'form-control']])
            ->add('phone_number', TextType::class, ['label' => 'Numer telefonu', 'attr' => ['class' => 'form-control']])
            ->add('email', EmailType::class, [
                'label' => 'Adres email',
                'attr' => [
                    'class' => 'form-control']
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Proposal'
        ]);
    }


}