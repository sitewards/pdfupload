<?php
/**
 * @category    Sitewards
 * @package     Sitewards_PdfUpload
 * @copyright   Copyright (c) Sitewards GmbH (http://www.sitewards.com/)
 */
class Sitewards_PdfUpload_Model_Rewrite_Core_File_Validator_Image extends Mage_Core_Model_File_Validator_Image
{
    /**
     * Validation callback for checking is file is image
     *
     * @param  string $sFilePath Path to temporary uploaded file
     * @return null
     * @throws Mage_Core_Exception
     */
    public function validate($sFilePath)
    {
        $sFileType = mime_content_type($sFilePath);

        if (parent::isImageType($sFileType)) {
            parent::validate($sFilePath);
        } else {
            if ($sFileType == 'application/pdf') {
                return null;
            } else {
                throw Mage::exception('Mage_Core', Mage::helper('core')->__('Invalid MIME type.'));
            }
        }
    }
}