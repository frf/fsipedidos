<?php



/**
 * This class defines the structure of the 'pessoa' table.
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
class PessoaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.PessoaTableMap';

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
        $this->setName('pessoa');
        $this->setPhpName('Pessoa');
        $this->setClassname('Pessoa');
        $this->setPackage('semp');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('pessoa_co_pessoa_seq');
        // columns
        $this->addPrimaryKey('co_pessoa', 'CoPessoa', 'INTEGER', true, null, null);
        $this->addColumn('no_pessoa', 'NoPessoa', 'VARCHAR', true, 200, null);
        $this->addColumn('nu_cpf', 'NuCpf', 'VARCHAR', false, 25, null);
        $this->addColumn('nu_cnpj', 'NuCnpj', 'VARCHAR', false, 25, null);
        $this->addForeignKey('co_empresa', 'CoEmpresa', 'INTEGER', 'empresa', 'co_empresa', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Empresa', 'Empresa', RelationMap::MANY_TO_ONE, array('co_empresa' => 'co_empresa', ), 'RESTRICT', 'CASCADE');
        $this->addRelation('Cliente', 'Cliente', RelationMap::ONE_TO_ONE, array('co_pessoa' => 'co_cliente', ), null, null);
        $this->addRelation('Colaborador', 'Colaborador', RelationMap::ONE_TO_ONE, array('co_pessoa' => 'co_colaborador', ), 'RESTRICT', 'CASCADE');
        $this->addRelation('Email', 'Email', RelationMap::ONE_TO_MANY, array('co_pessoa' => 'co_pessoa', ), 'CASCADE', 'CASCADE', 'Emails');
        $this->addRelation('Endereco', 'Endereco', RelationMap::ONE_TO_MANY, array('co_pessoa' => 'co_pessoa', ), 'CASCADE', 'CASCADE', 'Enderecos');
        $this->addRelation('Representada', 'Representada', RelationMap::ONE_TO_ONE, array('co_pessoa' => 'co_representada', ), 'RESTRICT', 'CASCADE');
        $this->addRelation('Telefone', 'Telefone', RelationMap::ONE_TO_MANY, array('co_pessoa' => 'co_pessoa', ), 'CASCADE', 'CASCADE', 'Telefones');
        $this->addRelation('Usuario', 'Usuario', RelationMap::ONE_TO_MANY, array('co_pessoa' => 'co_pessoa', ), 'RESTRICT', 'CASCADE', 'Usuarios');
    } // buildRelations()

} // PessoaTableMap
