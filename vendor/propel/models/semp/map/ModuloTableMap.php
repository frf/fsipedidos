<?php



/**
 * This class defines the structure of the 'modulo' table.
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
class ModuloTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.ModuloTableMap';

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
        $this->setName('modulo');
        $this->setPhpName('Modulo');
        $this->setClassname('Modulo');
        $this->setPackage('semp');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('no_modulo', 'NoModulo', 'VARCHAR', true, 50, null);
        $this->addColumn('no_exibicao', 'NoExibicao', 'VARCHAR', true, 100, null);
        $this->addColumn('ds_modulo', 'DsModulo', 'LONGVARCHAR', false, null, null);
        $this->addColumn('nu_ordem', 'NuOrdem', 'INTEGER', false, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ModuloTableMap
