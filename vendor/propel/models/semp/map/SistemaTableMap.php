<?php



/**
 * This class defines the structure of the 'sistema' table.
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
class SistemaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.SistemaTableMap';

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
        $this->setName('sistema');
        $this->setPhpName('Sistema');
        $this->setClassname('Sistema');
        $this->setPackage('semp');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('sistema_co_sistema_seq');
        // columns
        $this->addPrimaryKey('co_sistema', 'CoSistema', 'INTEGER', true, null, null);
        $this->addColumn('no_empresa', 'NoEmpresa', 'VARCHAR', false, 200, null);
        $this->addColumn('no_dominio', 'NoDominio', 'VARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Colaborador', 'Colaborador', RelationMap::ONE_TO_MANY, array('co_sistema' => 'co_sistema', ), null, null, 'Colaboradors');
    } // buildRelations()

} // SistemaTableMap
