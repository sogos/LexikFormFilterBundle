<?php

namespace Lexik\Bundle\FormFilterBundle\Filter\Extension\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Filter type for date range field.
 *
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class DateTimeRangeFilterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('left_datetime', 'filter_datetime', $options['left_datetime']);
        $builder->add('right_datetime', 'filter_datetime', $options['right_datetime']);

        $builder->setAttribute('filter_value_keys', array(
            'left_datetime'  => $options['left_datetime'],
            'right_datetime' => $options['right_datetime'],
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver
            ->setDefaults(array(
                'required'               => false,
                'left_datetime'          => array(),
                'right_datetime'         => array(),
                'data_extraction_method' => 'value_keys',
            ))
            ->setAllowedValues(array(
                'data_extraction_method' => array('value_keys'),
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'filter_datetime_range';
    }
}