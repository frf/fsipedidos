<?php



/**
 * Skeleton subclass for performing query and update operations on the 'transportadora.transportadora' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.semp
 */
class TransportadoraPeer extends BaseTransportadoraPeer
{
    public static function gravaTransportadora($aDados){
            try{
                
               $pdo = Propel::getConnection();

               $pdo->beginTransaction();

               $co_transportadora   = (int) $aDados['co_transportadora'];
               $no_transportadora   = $aDados['no_transportadora'];
               $no_site             = $aDados['no_site'];

               $oTransporte = TransportadoraQuery::create()
                       ->filterByCoTransportadora($co_transportadora)
                       ->findOne();

               if(!$oTransporte){
                   
                   $oTransporte = new Transportadora();
                   $oTransporte->setNoTransportadora($no_transportadora);
                   $oTransporte->setNoSite($no_site);
                   
               }else{
                   $oTransporte->setNoTransportadora($no_transportadora);
                   $oTransporte->setNoSite($no_site);
               }

               $oTransporte->save();
               $pdo->commit();
           }  catch (Exception $e){
               $pdo->rollBack();
               throw new Exception($e->getMessage());
           }
       }
}
