<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\Listing;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startDate', null, [
                'widget' => 'single_text'
            ])
            ->add('endDate', null, [
                'widget' => 'single_text'
            ])
            ->add('status')
            ->add('userId', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('listingId', EntityType::class, [
                'class' => Listing::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
