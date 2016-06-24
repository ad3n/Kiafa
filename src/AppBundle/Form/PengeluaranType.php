<?php

namespace AppBundle\Form;

use AppBundle\Entity\Transaksi;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PengeluaranType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('transactionDate', DateType::class, array(
                'label' => 'label.domain.tanggal_transaksi',
                'widget' => 'single_text',
                'attr' => array(
                    'class' => 'form-control datepicker',
                ),
            ))
            ->add('transactionType', HiddenType::class, array(
                'data' => Transaksi::CREDIT,
            ))
            ->add('rekening', EntityType::class, array(
                'class' => 'AppBundle\Entity\Rekening',
                'choice_label' => 'accountName',
                'placeholder' => 'label.placeholder.rekening',
                'label' => 'label.domain.rekening',
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('amount', NumberType::class, array(
                'label' => 'label.domain.jumlah_donasi',
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('note', TextType::class, array(
                'label' => 'label.domain.catatan',
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
            'data_class' => 'AppBundle\Entity\Transaksi',
            'translation_domain' => 'AppBundle',
            'intention' => 'donasi',
        ));
    }
}
