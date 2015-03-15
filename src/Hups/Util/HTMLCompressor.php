<?php

namespace Hups\Util;

/**
 * HTML compressor and minimizer utility
 * @category  Util
 * @package   Hups\Util\HTMLCompressor
 * @author    Szélpál Soma <szelpalsoma+hups@gmail.com>
 * @license   MIT Open Source License http://opensource.org/osi3.0/licenses/mit-license.php
 * @version   @package-version@
 */
class HTMLCompressor
{
    /**
     * Original input HTML
     * @var string
     */
    protected $html = null;

    /**
     * Filtered HTML
     * @var string
     */
    protected $filteredHtml = null;

    /**
     * Constructor
     * @param string $html Input HTML to compress
     */
    public function __construct($html)
    {
        $this->html = $html;
        $this->filteredHtml = $html;
    }

    /**
     * Apply all filters
     * @return Hups\Util\HTMLCompressor
     */
    public function compress()
    {
        $this->removeWhitespaces();
        $this->removeComments();
        $this->replaceAbsoluteUrls(true);
        return $this;
    }

    /**
     * Remove whitespaces
     * @return Hups\Util\HTMLCompressor
     */
    public function removeWhitespaces()
    {
        $this->filteredHtml = preg_replace("/(?<=>)\s+|\s+(?=<)/usi", '', $this->filteredHtml);
        return $this;
    }

    /**
     * Remove html comments
     * @return Hups\Util\HTMLCompressor
     */
    public function removeComments()
    {
        $this->filteredHtml = preg_replace("/<!--([^\[])(.*?)([^\]])-->/usi", '', $this->filteredHtml);
        return $this;
    }

    /**
     * Replace absolute urls with relative path
     * @return Hups\Util\HTMLCompressor
     */
    public function replaceAbsoluteUrls($currentHost = true)
    {
        $hosts = array();

        if ($currentHost === true)
        {
            $hosts[] = $_SERVER["HTTP_HOST"];
        }
        elseif (is_array($currentHost))
        {
            foreach ($currentHost as $h)
            {
                $hosts[] = $h;
            }
        }

        foreach ($hosts as $h)
        {
            $this->filteredHtml = preg_replace("/=([\"'])((http[s]?:\/\/)?".$h.")/usi", '=$1', $this->filteredHtml);
        }
        
        return $this;
    }

    /**
     * Returns original input HTML
     * @return string Input HTML
     */
    public function getOriginal()
    {        
        return $this->html;
    }

    /**
     * Returns the filtered HTML
     * @return string Filtered HTML
     */
    public function get()
    {        
        return $this->filteredHtml;
    }

    /**
     * __toString
     * @return string Filtered HTML
     */
    public function __toString()
    {
        return $this->get();
    }
}

