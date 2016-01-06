<?php

namespace AppBundle\Form;

use AppBundle\Entity\Transaksi;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('transactionType', HiddenType::class, array(
                'data' => Transaksi::CREDIT,
            ))
            ->add('rekening', EntityType::class, array(
                'choice_label' => 'accountName',
                'label' => 'label.domain.rekening',
                'attr' => array(
                    'class' => 'btn btn-primary',
                ),
            ))
            ->add('amout', NumberType::class, array(
                'label' => 'label.domain.jumlah_donasi',
                'attr' => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('note', TextType::class, array(
                'label' => 'label.domain.catatan',
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
            'data_class' => 'AppBundle\Entity\Transaksi',
            'translation_domain' => 'AppBundle',
            'intention' => 'donasi',
        ));
    }
}
