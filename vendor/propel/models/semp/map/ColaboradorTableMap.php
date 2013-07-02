<?php



/**
 * This class defines the structure of the 'colaboradores.colaborador' table.
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
class ColaboradorTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.ColaboradorTableMap';

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
        $this->setName('colaboradores.colaborador');
        $this->setPhpName('Colaborador');
        $this->setClassname('Colaborador');
        $this->setPackage('semp');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('co_colaborador', 'CoColaborador', 'INTEGER' , 'pessoa', 'co_pessoa', true, null, null);
        $this->addColumn('ds_email', 'DsEmail', 'VARCHAR', false, 250, null);
        $this->addColumn('tp_administrador', 'TpAdministrador', 'BOOLEAN', false, null, null);
        $this->addColumn('ds_telefone', 'DsTelefone', 'VARCHAR', false, 33, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Pessoa', 'Pessoa', RelationMap::MANY_TO_ONE, array('co_colaborador' => 'co_pessoa', ), 'RESTRICT', 'CASCADE');
        $this->addRelation('ClienteColaborador', 'ClienteColaborador', RelationMap::ONE_TO_MANY, array('co_colaborador' => 'co_colaborador', ), null, null, 'ClienteColaboradors');
        $this->addRelation('Pedido', 'Pedido', RelationMap::ONE_TO_MANY, array('co_colaborador' => 'co_colaborador', ), 'RESTRICT', 'CASCADE', 'Pedidos');
        $this->addRelation('RepresentadaColaborador', 'RepresentadaColaborador', RelationMap::ONE_TO_MANY, array('co_colaborador' => 'co_colaborador', ), null, null, 'RepresentadaColaboradors');
    } // buildRelations()

} // ColaboradorTableMap
