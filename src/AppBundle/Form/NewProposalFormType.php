<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NewProposalFormType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('loan_amount')
            ->add('loan_duration')
            ->add('phone_number', TextType::class,array(
                'attr'=> array('style' => 'margin-left:50px'),
                'label_attr' => array('style' => 'margin-left:150px')) )
            ->add('email', EmailType::class, array('label'=>'Adres email'))
            ->add('date_add',DateType::class,array(
                'years' => range(1901,2020)
               // 'widget' => 'single_text',
            ));
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Proposal'
        ]);
    }


}