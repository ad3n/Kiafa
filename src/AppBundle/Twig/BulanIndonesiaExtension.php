<?php

namespace AppBundle\Twig;


use AppBundle\Util\BulanIndonesia;

class BulanIndonesiaExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('bulan_to_text', array($this, 'convertToText')),
            new \Twig_SimpleFilter('text_to_bulan', array($this, 'convertToBulan')),
        );
    }

    public function convertToText($bulan)
    {
        return BulanIndonesia::convertToText($bulan);
    }

    public function convertToBulan($text)
    {
        return BulanIndonesia::convertToNumber($text);
    }

    public function getName()
    {
        return 'bulan_indonesia';

    }
}