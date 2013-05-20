<?php



/**
 * This class defines the structure of the 'perfil' table.
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
class PerfilTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.PerfilTableMap';

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
        $this->setName('perfil');
        $this->setPhpName('Perfil');
        $this->setClassname('Perfil');
        $this->setPackage('semp');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('perfil_co_perfil_seq');
        // columns
        $this->addPrimaryKey('co_perfil', 'CoPerfil', 'INTEGER', true, null, null);
        $this->addColumn('no_perfil', 'NoPerfil', 'VARCHAR', false, 150, null);
        $this->addColumn('ds_perfil', 'DsPerfil', 'LONGVARCHAR', false, null, null);
        $this->addColumn('st_perfil', 'StPerfil', 'BOOLEAN', true, null, true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Colaborador', 'Colaborador', RelationMap::ONE_TO_MANY, array('co_perfil' => 'co_perfil', ), null, null, 'Colaboradors');
        $this->addRelation('Permissao', 'Permissao', RelationMap::ONE_TO_MANY, array('co_perfil' => 'co_perfil', ), 'RESTRICT', 'CASCADE', 'Permissaos');
        $this->addRelation('Usuario', 'Usuario', RelationMap::ONE_TO_MANY, array('co_perfil' => 'co_perfil', ), 'RESTRICT', 'CASCADE', 'Usuarios');
    } // buildRelations()

} // PerfilTableMap
