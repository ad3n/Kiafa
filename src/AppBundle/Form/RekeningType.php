<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RekeningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('accountName', TextType::class, array(
                'label' => 'label.domain.account_name',
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('accountNumber', TextType::class, array(
                'label' => 'label.domain.account_number',
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'action.submit',
                'attr' => array(
                    'class' => 'btn btn-primary',
                ),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Rekening',
            'translation_domain' => 'AppBundle',
            'intention' => 'rekening',
        ));
    }
}
