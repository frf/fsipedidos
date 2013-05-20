<?php



/**
 * This class defines the structure of the 'cliente.cliente_colaborador' table.
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
class ClienteColaboradorTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.ClienteColaboradorTableMap';

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
        $this->setName('cliente.cliente_colaborador');
        $this->setPhpName('ClienteColaborador');
        $this->setClassname('ClienteColaborador');
        $this->setPackage('semp');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('co_cliente', 'CoCliente', 'INTEGER' , 'cliente.cliente', 'co_cliente', true, null, null);
        $this->addForeignPrimaryKey('co_colaborador', 'CoColaborador', 'INTEGER' , 'colaboradores.colaborador', 'co_colaborador', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cliente', 'Cliente', RelationMap::MANY_TO_ONE, array('co_cliente' => 'co_cliente', ), null, null);
        $this->addRelation('Colaborador', 'Colaborador', RelationMap::MANY_TO_ONE, array('co_colaborador' => 'co_colaborador', ), null, null);
    } // buildRelations()

} // ClienteColaboradorTableMap
