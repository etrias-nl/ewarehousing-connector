<?php

namespace Etrias\EwarehousingConnector\Services;


use Etrias\EwarehousingConnector\Response\DocumentResponse;
use Etrias\EwarehousingConnector\Response\SuccessResponse;

interface DocumentServiceInterface
{
    /**
     * @param string            $reference
     *
     * @return DocumentResponse[]
     */
    public function getAll($reference);

    /**
     * @param string            $reference
     * @param string            $fileContent
     * @param string|null       $fileName
     * @param integer|null      $quantityToPrint
     * @param boolean           $isShippingLabel
     *
     * @return SuccessResponse
     */
    public function add($reference, $fileContent, $fileName = null, $quantityToPrint = null, $isShippingLabel = false);

    /**
     * @param string            $documentId
     *
     * @return SuccessResponse
     */
    public function delete($documentId);
}