<?php



/**
 * This class defines the structure of the 'cliente.cliente' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.semp.map
 */
class ClienteTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.ClienteTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('cliente.cliente');
        $this->setPhpName('Cliente');
        $this->setClassname('Cliente');
        $this->setPackage('semp');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('co_cliente', 'CoCliente', 'INTEGER' , 'pessoa', 'co_pessoa', true, null, null);
        $this->addColumn('ds_razao_social', 'DsRazaoSocial', 'VARCHAR', false, 255, null);
        $this->addColumn('ds_inscricao_estadual', 'DsInscricaoEstadual', 'VARCHAR', false, 255, null);
        $this->addColumn('st_suframa', 'StSuframa', 'BOOLEAN', false, null, null);
        $this->addColumn('ds_ramo_atividade', 'DsRamoAtividade', 'LONGVARCHAR', false, null, null);
        $this->addColumn('dt_cadastro', 'DtCadastro', 'TIMESTAMP', false, null, 'now()');
        $this->addColumn('dt_fundacao', 'DtFundacao', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Pessoa', 'Pessoa', RelationMap::MANY_TO_ONE, array('co_cliente' => 'co_pessoa', ), null, null);
        $this->addRelation('ClienteColaborador', 'ClienteColaborador', RelationMap::ONE_TO_MANY, array('co_cliente' => 'co_cliente', ), null, null, 'ClienteColaboradors');
    } // buildRelations()

} // ClienteTableMap
