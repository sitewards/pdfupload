<?php
/**
 * @category    Sitewards
 * @package     Sitewards_PdfUpload
 * @copyright   Copyright (c) Sitewards GmbH (http://www.sitewards.com/)
 */
class Sitewards_PdfUpload_Model_Rewrite_Cms_Wysiwyg_Images_Storage extends Mage_Cms_Model_Wysiwyg_Images_Storage
{

    private $_allowedImageTypes = array(
        IMAGETYPE_JPEG,
        IMAGETYPE_GIF,
        IMAGETYPE_JPEG2000,
        IMAGETYPE_PNG,
        IMAGETYPE_ICO,
        IMAGETYPE_TIFF_II,
        IMAGETYPE_TIFF_MM
    );

    /**
     * Create thumbnail for image and save it to thumbnails directory
     *
     * @param string $sSource Image path to be resized
     * @param bool $bKeepRation Keep aspect ratio or not
     * @return bool|string Resized filepath or false if errors were occurred
     */
    public function resizeFile($sSource, $bKeepRation = true)
    {
        $sFileType = mime_content_type($sSource);

        if($this->isImageType($sFileType)) {
            return parent::resizeFile($sSource, $bKeepRation);
        } else {
            return false;
        }
    }

    /**
     * Returns is image by image type
     * @param int $iImageType
     * @return bool
     */
    private function isImageType($iImageType)
    {
        return in_array($iImageType, $this->_allowedImageTypes);
    }
}
