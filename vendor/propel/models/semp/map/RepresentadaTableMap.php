<?php



/**
 * This class defines the structure of the 'representada.representada' table.
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
class RepresentadaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'semp.map.RepresentadaTableMap';

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
        $this->setName('representada.representada');
        $this->setPhpName('Representada');
        $this->setClassname('Representada');
        $this->setPackage('semp');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('co_representada', 'CoRepresentada', 'INTEGER' , 'pessoa', 'co_pessoa', true, null, null);
        $this->addColumn('ds_razao_social', 'DsRazaoSocial', 'VARCHAR', false, 255, null);
        $this->addColumn('dt_cadastro', 'DtCadastro', 'TIMESTAMP', false, null, 'now()');
        $this->addColumn('nu_comissao', 'NuComissao', 'VARCHAR', false, 255, null);
        $this->addColumn('ds_info_adicionais', 'DsInfoAdicionais', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Pessoa', 'Pessoa', RelationMap::MANY_TO_ONE, array('co_representada' => 'co_pessoa', ), 'RESTRICT', 'CASCADE');
        $this->addRelation('ProdutoRepresentada', 'ProdutoRepresentada', RelationMap::ONE_TO_MANY, array('co_representada' => 'co_representada', ), 'RESTRICT', 'CASCADE', 'ProdutoRepresentadas');
        $this->addRelation('RepresentadaColaborador', 'RepresentadaColaborador', RelationMap::ONE_TO_MANY, array('co_representada' => 'co_representada', ), null, null, 'RepresentadaColaboradors');
    } // buildRelations()

} // RepresentadaTableMap
