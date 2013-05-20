<?php



/**
 * This class defines the structure of the 'permissao' table.
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
class PermissaoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.PermissaoTableMap';

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
        $this->setName('permissao');
        $this->setPhpName('Permissao');
        $this->setClassname('Permissao');
        $this->setPackage('semp');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('co_perfil', 'CoPerfil', 'INTEGER' , 'perfil', 'co_perfil', true, null, null);
        $this->addColumn('dt_alteracao', 'DtAlteracao', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('co_usuario_alteracao', 'CoUsuarioAlteracao', 'INTEGER', 'usuario', 'co_usuario', false, null, null);
        $this->addForeignPrimaryKey('co_recurso', 'CoRecurso', 'INTEGER' , 'recurso', 'co_recurso', true, null, null);
        $this->addColumn('st_permissao', 'StPermissao', 'BOOLEAN', true, null, true);
        $this->addColumn('dt_cadastro', 'DtCadastro', 'TIMESTAMP', true, null, 'now()');
        $this->addForeignKey('co_usuario_cadastro', 'CoUsuarioCadastro', 'INTEGER', 'usuario', 'co_usuario', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Perfil', 'Perfil', RelationMap::MANY_TO_ONE, array('co_perfil' => 'co_perfil', ), 'RESTRICT', 'CASCADE');
        $this->addRelation('Recurso', 'Recurso', RelationMap::MANY_TO_ONE, array('co_recurso' => 'co_recurso', ), 'RESTRICT', 'CASCADE');
        $this->addRelation('UsuarioRelatedByCoUsuarioAlteracao', 'Usuario', RelationMap::MANY_TO_ONE, array('co_usuario_alteracao' => 'co_usuario', ), 'RESTRICT', 'CASCADE');
        $this->addRelation('UsuarioRelatedByCoUsuarioCadastro', 'Usuario', RelationMap::MANY_TO_ONE, array('co_usuario_cadastro' => 'co_usuario', ), 'RESTRICT', 'CASCADE');
    } // buildRelations()

} // PermissaoTableMap
