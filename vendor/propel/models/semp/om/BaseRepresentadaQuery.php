<?php


/**
 * Base class that represents a query for the 'representada.representada' table.
 *
 *
 *
 * @method RepresentadaQuery orderByCoRepresentada($order = Criteria::ASC) Order by the co_representada column
 * @method RepresentadaQuery orderByDsRazaoSocial($order = Criteria::ASC) Order by the ds_razao_social column
 * @method RepresentadaQuery orderByDtCadastro($order = Criteria::ASC) Order by the dt_cadastro column
 * @method RepresentadaQuery orderByNuComissao($order = Criteria::ASC) Order by the nu_comissao column
 * @method RepresentadaQuery orderByDsInfoAdicionais($order = Criteria::ASC) Order by the ds_info_adicionais column
 *
 * @method RepresentadaQuery groupByCoRepresentada() Group by the co_representada column
 * @method RepresentadaQuery groupByDsRazaoSocial() Group by the ds_razao_social column
 * @method RepresentadaQuery groupByDtCadastro() Group by the dt_cadastro column
 * @method RepresentadaQuery groupByNuComissao() Group by the nu_comissao column
 * @method RepresentadaQuery groupByDsInfoAdicionais() Group by the ds_info_adicionais column
 *
 * @method RepresentadaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RepresentadaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RepresentadaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RepresentadaQuery leftJoinPessoa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pessoa relation
 * @method RepresentadaQuery rightJoinPessoa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pessoa relation
 * @method RepresentadaQuery innerJoinPessoa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pessoa relation
 *
 * @method RepresentadaQuery leftJoinPedido($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pedido relation
 * @method RepresentadaQuery rightJoinPedido($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pedido relation
 * @method RepresentadaQuery innerJoinPedido($relationAlias = null) Adds a INNER JOIN clause to the query using the Pedido relation
 *
 * @method RepresentadaQuery leftJoinProdutoRepresentada($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProdutoRepresentada relation
 * @method RepresentadaQuery rightJoinProdutoRepresentada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProdutoRepresentada relation
 * @method RepresentadaQuery innerJoinProdutoRepresentada($relationAlias = null) Adds a INNER JOIN clause to the query using the ProdutoRepresentada relation
 *
 * @method RepresentadaQuery leftJoinRepresentadaColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the RepresentadaColaborador relation
 * @method RepresentadaQuery rightJoinRepresentadaColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RepresentadaColaborador relation
 * @method RepresentadaQuery innerJoinRepresentadaColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the RepresentadaColaborador relation
 *
 * @method Representada findOne(PropelPDO $con = null) Return the first Representada matching the query
 * @method Representada findOneOrCreate(PropelPDO $con = null) Return the first Representada matching the query, or a new Representada object populated from the query conditions when no match is found
 *
 * @method Representada findOneByDsRazaoSocial(string $ds_razao_social) Return the first Representada filtered by the ds_razao_social column
 * @method Representada findOneByDtCadastro(string $dt_cadastro) Return the first Representada filtered by the dt_cadastro column
 * @method Representada findOneByNuComissao(string $nu_comissao) Return the first Representada filtered by the nu_comissao column
 * @method Representada findOneByDsInfoAdicionais(string $ds_info_adicionais) Return the first Representada filtered by the ds_info_adicionais column
 *
 * @method array findByCoRepresentada(int $co_representada) Return Representada objects filtered by the co_representada column
 * @method array findByDsRazaoSocial(string $ds_razao_social) Return Representada objects filtered by the ds_razao_social column
 * @method array findByDtCadastro(string $dt_cadastro) Return Representada objects filtered by the dt_cadastro column
 * @method array findByNuComissao(string $nu_comissao) Return Representada objects filtered by the nu_comissao column
 * @method array findByDsInfoAdicionais(string $ds_info_adicionais) Return Representada objects filtered by the ds_info_adicionais column
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseRepresentadaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRepresentadaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'Representada', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RepresentadaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RepresentadaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RepresentadaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RepresentadaQuery) {
            return $criteria;
        }
        $query = new RepresentadaQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Representada|Representada[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RepresentadaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RepresentadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Representada A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCoRepresentada($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Representada A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT co_representada, ds_razao_social, dt_cadastro, nu_comissao, ds_info_adicionais FROM representada.representada WHERE co_representada = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Representada();
            $obj->hydrate($row);
            RepresentadaPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Representada|Representada[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Representada[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RepresentadaPeer::CO_REPRESENTADA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RepresentadaPeer::CO_REPRESENTADA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the co_representada column
     *
     * Example usage:
     * <code>
     * $query->filterByCoRepresentada(1234); // WHERE co_representada = 1234
     * $query->filterByCoRepresentada(array(12, 34)); // WHERE co_representada IN (12, 34)
     * $query->filterByCoRepresentada(array('min' => 12)); // WHERE co_representada >= 12
     * $query->filterByCoRepresentada(array('max' => 12)); // WHERE co_representada <= 12
     * </code>
     *
     * @see       filterByPessoa()
     *
     * @param     mixed $coRepresentada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function filterByCoRepresentada($coRepresentada = null, $comparison = null)
    {
        if (is_array($coRepresentada)) {
            $useMinMax = false;
            if (isset($coRepresentada['min'])) {
                $this->addUsingAlias(RepresentadaPeer::CO_REPRESENTADA, $coRepresentada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coRepresentada['max'])) {
                $this->addUsingAlias(RepresentadaPeer::CO_REPRESENTADA, $coRepresentada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RepresentadaPeer::CO_REPRESENTADA, $coRepresentada, $comparison);
    }

    /**
     * Filter the query on the ds_razao_social column
     *
     * Example usage:
     * <code>
     * $query->filterByDsRazaoSocial('fooValue');   // WHERE ds_razao_social = 'fooValue'
     * $query->filterByDsRazaoSocial('%fooValue%'); // WHERE ds_razao_social LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsRazaoSocial The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function filterByDsRazaoSocial($dsRazaoSocial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsRazaoSocial)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsRazaoSocial)) {
                $dsRazaoSocial = str_replace('*', '%', $dsRazaoSocial);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RepresentadaPeer::DS_RAZAO_SOCIAL, $dsRazaoSocial, $comparison);
    }

    /**
     * Filter the query on the dt_cadastro column
     *
     * Example usage:
     * <code>
     * $query->filterByDtCadastro('2011-03-14'); // WHERE dt_cadastro = '2011-03-14'
     * $query->filterByDtCadastro('now'); // WHERE dt_cadastro = '2011-03-14'
     * $query->filterByDtCadastro(array('max' => 'yesterday')); // WHERE dt_cadastro > '2011-03-13'
     * </code>
     *
     * @param     mixed $dtCadastro The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function filterByDtCadastro($dtCadastro = null, $comparison = null)
    {
        if (is_array($dtCadastro)) {
            $useMinMax = false;
            if (isset($dtCadastro['min'])) {
                $this->addUsingAlias(RepresentadaPeer::DT_CADASTRO, $dtCadastro['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtCadastro['max'])) {
                $this->addUsingAlias(RepresentadaPeer::DT_CADASTRO, $dtCadastro['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RepresentadaPeer::DT_CADASTRO, $dtCadastro, $comparison);
    }

    /**
     * Filter the query on the nu_comissao column
     *
     * Example usage:
     * <code>
     * $query->filterByNuComissao('fooValue');   // WHERE nu_comissao = 'fooValue'
     * $query->filterByNuComissao('%fooValue%'); // WHERE nu_comissao LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nuComissao The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function filterByNuComissao($nuComissao = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nuComissao)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nuComissao)) {
                $nuComissao = str_replace('*', '%', $nuComissao);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RepresentadaPeer::NU_COMISSAO, $nuComissao, $comparison);
    }

    /**
     * Filter the query on the ds_info_adicionais column
     *
     * Example usage:
     * <code>
     * $query->filterByDsInfoAdicionais('fooValue');   // WHERE ds_info_adicionais = 'fooValue'
     * $query->filterByDsInfoAdicionais('%fooValue%'); // WHERE ds_info_adicionais LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsInfoAdicionais The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function filterByDsInfoAdicionais($dsInfoAdicionais = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsInfoAdicionais)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsInfoAdicionais)) {
                $dsInfoAdicionais = str_replace('*', '%', $dsInfoAdicionais);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RepresentadaPeer::DS_INFO_ADICIONAIS, $dsInfoAdicionais, $comparison);
    }

    /**
     * Filter the query by a related Pessoa object
     *
     * @param   Pessoa|PropelObjectCollection $pessoa The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RepresentadaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPessoa($pessoa, $comparison = null)
    {
        if ($pessoa instanceof Pessoa) {
            return $this
                ->addUsingAlias(RepresentadaPeer::CO_REPRESENTADA, $pessoa->getCoPessoa(), $comparison);
        } elseif ($pessoa instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RepresentadaPeer::CO_REPRESENTADA, $pessoa->toKeyValue('PrimaryKey', 'CoPessoa'), $comparison);
        } else {
            throw new PropelException('filterByPessoa() only accepts arguments of type Pessoa or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pessoa relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function joinPessoa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pessoa');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Pessoa');
        }

        return $this;
    }

    /**
     * Use the Pessoa relation Pessoa object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PessoaQuery A secondary query class using the current class as primary query
     */
    public function usePessoaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPessoa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pessoa', 'PessoaQuery');
    }

    /**
     * Filter the query by a related Pedido object
     *
     * @param   Pedido|PropelObjectCollection $pedido  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RepresentadaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPedido($pedido, $comparison = null)
    {
        if ($pedido instanceof Pedido) {
            return $this
                ->addUsingAlias(RepresentadaPeer::CO_REPRESENTADA, $pedido->getCoRepresentada(), $comparison);
        } elseif ($pedido instanceof PropelObjectCollection) {
            return $this
                ->usePedidoQuery()
                ->filterByPrimaryKeys($pedido->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPedido() only accepts arguments of type Pedido or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pedido relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function joinPedido($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pedido');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Pedido');
        }

        return $this;
    }

    /**
     * Use the Pedido relation Pedido object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PedidoQuery A secondary query class using the current class as primary query
     */
    public function usePedidoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPedido($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pedido', 'PedidoQuery');
    }

    /**
     * Filter the query by a related ProdutoRepresentada object
     *
     * @param   ProdutoRepresentada|PropelObjectCollection $produtoRepresentada  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RepresentadaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProdutoRepresentada($produtoRepresentada, $comparison = null)
    {
        if ($produtoRepresentada instanceof ProdutoRepresentada) {
            return $this
                ->addUsingAlias(RepresentadaPeer::CO_REPRESENTADA, $produtoRepresentada->getCoRepresentada(), $comparison);
        } elseif ($produtoRepresentada instanceof PropelObjectCollection) {
            return $this
                ->useProdutoRepresentadaQuery()
                ->filterByPrimaryKeys($produtoRepresentada->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProdutoRepresentada() only accepts arguments of type ProdutoRepresentada or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProdutoRepresentada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function joinProdutoRepresentada($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProdutoRepresentada');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ProdutoRepresentada');
        }

        return $this;
    }

    /**
     * Use the ProdutoRepresentada relation ProdutoRepresentada object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProdutoRepresentadaQuery A secondary query class using the current class as primary query
     */
    public function useProdutoRepresentadaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProdutoRepresentada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProdutoRepresentada', 'ProdutoRepresentadaQuery');
    }

    /**
     * Filter the query by a related RepresentadaColaborador object
     *
     * @param   RepresentadaColaborador|PropelObjectCollection $representadaColaborador  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RepresentadaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRepresentadaColaborador($representadaColaborador, $comparison = null)
    {
        if ($representadaColaborador instanceof RepresentadaColaborador) {
            return $this
                ->addUsingAlias(RepresentadaPeer::CO_REPRESENTADA, $representadaColaborador->getCoRepresentada(), $comparison);
        } elseif ($representadaColaborador instanceof PropelObjectCollection) {
            return $this
                ->useRepresentadaColaboradorQuery()
                ->filterByPrimaryKeys($representadaColaborador->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRepresentadaColaborador() only accepts arguments of type RepresentadaColaborador or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RepresentadaColaborador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function joinRepresentadaColaborador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RepresentadaColaborador');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RepresentadaColaborador');
        }

        return $this;
    }

    /**
     * Use the RepresentadaColaborador relation RepresentadaColaborador object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RepresentadaColaboradorQuery A secondary query class using the current class as primary query
     */
    public function useRepresentadaColaboradorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRepresentadaColaborador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RepresentadaColaborador', 'RepresentadaColaboradorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Representada $representada Object to remove from the list of results
     *
     * @return RepresentadaQuery The current query, for fluid interface
     */
    public function prune($representada = null)
    {
        if ($representada) {
            $this->addUsingAlias(RepresentadaPeer::CO_REPRESENTADA, $representada->getCoRepresentada(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
