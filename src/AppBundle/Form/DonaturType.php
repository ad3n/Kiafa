<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DonaturType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class, array(
                'label' => 'label.domain.fullname',
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('address', TextType::class, array(
                'label' => 'label.domain.address',
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('email', EmailType::class, array(
                'label' => 'label.domain.email',
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('phoneNumber', TextType::class, array(
                'label' => 'label.domain.phonenumber',
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('isHambaAllah', CheckboxType::class, array(
                'label' => 'label.domain.hamba_allah',
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Donatur',
            'translation_domain' => 'AppBundle',
            'intention' => 'donasi',
        ));
    }
}
