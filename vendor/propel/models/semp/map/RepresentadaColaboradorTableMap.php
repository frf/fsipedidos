<?php



/**
 * This class defines the structure of the 'representada.representada_colaborador' table.
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
class RepresentadaColaboradorTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.RepresentadaColaboradorTableMap';

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
        $this->setName('representada.representada_colaborador');
        $this->setPhpName('RepresentadaColaborador');
        $this->setClassname('RepresentadaColaborador');
        $this->setPackage('semp');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('co_representada', 'CoRepresentada', 'INTEGER' , 'representada.representada', 'co_representada', true, null, null);
        $this->addForeignPrimaryKey('co_colaborador', 'CoColaborador', 'INTEGER' , 'colaboradores.colaborador', 'co_colaborador', true, null, null);
        $this->addColumn('nu_comissao', 'NuComissao', 'VARCHAR', true, 3, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Colaborador', 'Colaborador', RelationMap::MANY_TO_ONE, array('co_colaborador' => 'co_colaborador', ), null, null);
        $this->addRelation('Representada', 'Representada', RelationMap::MANY_TO_ONE, array('co_representada' => 'co_representada', ), null, null);
    } // buildRelations()

} // RepresentadaColaboradorTableMap
