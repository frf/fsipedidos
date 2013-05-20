<?php



/**
 * This class defines the structure of the 'recurso' table.
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
class RecursoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.RecursoTableMap';

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
        $this->setName('recurso');
        $this->setPhpName('Recurso');
        $this->setClassname('Recurso');
        $this->setPackage('semp');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('recurso_co_recurso_seq');
        // columns
        $this->addPrimaryKey('co_recurso', 'CoRecurso', 'INTEGER', true, null, null);
        $this->addColumn('no_recurso', 'NoRecurso', 'VARCHAR', false, 150, null);
        $this->addColumn('ds_recurso', 'DsRecurso', 'VARCHAR', false, 255, null);
        $this->addColumn('tp_recurso', 'TpRecurso', 'INTEGER', false, null, null);
        $this->addColumn('dt_cadastro', 'DtCadastro', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('co_usuario_cadastro', 'CoUsuarioCadastro', 'INTEGER', false, null, null);
        $this->addColumn('dt_alteracao', 'DtAlteracao', 'TIMESTAMP', false, null, null);
        $this->addColumn('co_usuario_alteracao', 'CoUsuarioAlteracao', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Permissao', 'Permissao', RelationMap::ONE_TO_MANY, array('co_recurso' => 'co_recurso', ), 'RESTRICT', 'CASCADE', 'Permissaos');
    } // buildRelations()

} // RecursoTableMap
