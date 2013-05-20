<?php



/**
 * This class defines the structure of the 'usuario' table.
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
class UsuarioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.UsuarioTableMap';

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
        $this->setName('usuario');
        $this->setPhpName('Usuario');
        $this->setClassname('Usuario');
        $this->setPackage('semp');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('usuario_co_usuario_seq');
        // columns
        $this->addPrimaryKey('co_usuario', 'CoUsuario', 'INTEGER', true, null, null);
        $this->addColumn('nu_cpf', 'NuCpf', 'VARCHAR', false, 11, null);
        $this->addColumn('ds_password', 'DsPassword', 'VARCHAR', false, 200, null);
        $this->addColumn('no_usuario', 'NoUsuario', 'VARCHAR', false, 255, null);
        $this->addColumn('ds_login', 'DsLogin', 'VARCHAR', false, 39, null);
        $this->addColumn('dt_ultimo_login', 'DtUltimoLogin', 'TIMESTAMP', false, null, null);
        $this->addColumn('ds_email', 'DsEmail', 'VARCHAR', false, 120, null);
        $this->addForeignKey('co_perfil', 'CoPerfil', 'INTEGER', 'perfil', 'co_perfil', false, null, null);
        $this->addColumn('nu_celular', 'NuCelular', 'VARCHAR', false, 15, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Perfil', 'Perfil', RelationMap::MANY_TO_ONE, array('co_perfil' => 'co_perfil', ), 'RESTRICT', 'CASCADE');
        $this->addRelation('PermissaoRelatedByCoUsuarioAlteracao', 'Permissao', RelationMap::ONE_TO_MANY, array('co_usuario' => 'co_usuario_alteracao', ), 'RESTRICT', 'CASCADE', 'PermissaosRelatedByCoUsuarioAlteracao');
        $this->addRelation('PermissaoRelatedByCoUsuarioCadastro', 'Permissao', RelationMap::ONE_TO_MANY, array('co_usuario' => 'co_usuario_cadastro', ), 'RESTRICT', 'CASCADE', 'PermissaosRelatedByCoUsuarioCadastro');
    } // buildRelations()

} // UsuarioTableMap
