<?php


/**
 * Base class that represents a query for the 'cliente.cliente' table.
 *
 *
 *
 * @method ClienteQuery orderByCoCliente($order = Criteria::ASC) Order by the co_cliente column
 * @method ClienteQuery orderByDsRazaoSocial($order = Criteria::ASC) Order by the ds_razao_social column
 * @method ClienteQuery orderByDsInscricaoEstadual($order = Criteria::ASC) Order by the ds_inscricao_estadual column
 * @method ClienteQuery orderByStSuframa($order = Criteria::ASC) Order by the st_suframa column
 * @method ClienteQuery orderByDsRamoAtividade($order = Criteria::ASC) Order by the ds_ramo_atividade column
 * @method ClienteQuery orderByDtCadastro($order = Criteria::ASC) Order by the dt_cadastro column
 * @method ClienteQuery orderByDtFundacao($order = Criteria::ASC) Order by the dt_fundacao column
 *
 * @method ClienteQuery groupByCoCliente() Group by the co_cliente column
 * @method ClienteQuery groupByDsRazaoSocial() Group by the ds_razao_social column
 * @method ClienteQuery groupByDsInscricaoEstadual() Group by the ds_inscricao_estadual column
 * @method ClienteQuery groupByStSuframa() Group by the st_suframa column
 * @method ClienteQuery groupByDsRamoAtividade() Group by the ds_ramo_atividade column
 * @method ClienteQuery groupByDtCadastro() Group by the dt_cadastro column
 * @method ClienteQuery groupByDtFundacao() Group by the dt_fundacao column
 *
 * @method ClienteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClienteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClienteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClienteQuery leftJoinPessoa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pessoa relation
 * @method ClienteQuery rightJoinPessoa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pessoa relation
 * @method ClienteQuery innerJoinPessoa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pessoa relation
 *
 * @method ClienteQuery leftJoinClienteColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClienteColaborador relation
 * @method ClienteQuery rightJoinClienteColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClienteColaborador relation
 * @method ClienteQuery innerJoinClienteColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the ClienteColaborador relation
 *
 * @method Cliente findOne(PropelPDO $con = null) Return the first Cliente matching the query
 * @method Cliente findOneOrCreate(PropelPDO $con = null) Return the first Cliente matching the query, or a new Cliente object populated from the query conditions when no match is found
 *
 * @method Cliente findOneByDsRazaoSocial(string $ds_razao_social) Return the first Cliente filtered by the ds_razao_social column
 * @method Cliente findOneByDsInscricaoEstadual(string $ds_inscricao_estadual) Return the first Cliente filtered by the ds_inscricao_estadual column
 * @method Cliente findOneByStSuframa(boolean $st_suframa) Return the first Cliente filtered by the st_suframa column
 * @method Cliente findOneByDsRamoAtividade(string $ds_ramo_atividade) Return the first Cliente filtered by the ds_ramo_atividade column
 * @method Cliente findOneByDtCadastro(string $dt_cadastro) Return the first Cliente filtered by the dt_cadastro column
 * @method Cliente findOneByDtFundacao(string $dt_fundacao) Return the first Cliente filtered by the dt_fundacao column
 *
 * @method array findByCoCliente(int $co_cliente) Return Cliente objects filtered by the co_cliente column
 * @method array findByDsRazaoSocial(string $ds_razao_social) Return Cliente objects filtered by the ds_razao_social column
 * @method array findByDsInscricaoEstadual(string $ds_inscricao_estadual) Return Cliente objects filtered by the ds_inscricao_estadual column
 * @method array findByStSuframa(boolean $st_suframa) Return Cliente objects filtered by the st_suframa column
 * @method array findByDsRamoAtividade(string $ds_ramo_atividade) Return Cliente objects filtered by the ds_ramo_atividade column
 * @method array findByDtCadastro(string $dt_cadastro) Return Cliente objects filtered by the dt_cadastro column
 * @method array findByDtFundacao(string $dt_fundacao) Return Cliente objects filtered by the dt_fundacao column
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseClienteQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClienteQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'Cliente', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClienteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClienteQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClienteQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClienteQuery) {
            return $criteria;
        }
        $query = new ClienteQuery();
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
     * @return   Cliente|Cliente[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Cliente A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCoCliente($key, $con = null)
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
     * @return                 Cliente A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT co_cliente, ds_razao_social, ds_inscricao_estadual, st_suframa, ds_ramo_atividade, dt_cadastro, dt_fundacao FROM cliente.cliente WHERE co_cliente = :p0';
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
            $obj = new Cliente();
            $obj->hydrate($row);
            ClientePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Cliente|Cliente[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Cliente[]|mixed the list of results, formatted by the current formatter
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
     * @return ClienteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientePeer::CO_CLIENTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClienteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientePeer::CO_CLIENTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the co_cliente column
     *
     * Example usage:
     * <code>
     * $query->filterByCoCliente(1234); // WHERE co_cliente = 1234
     * $query->filterByCoCliente(array(12, 34)); // WHERE co_cliente IN (12, 34)
     * $query->filterByCoCliente(array('min' => 12)); // WHERE co_cliente >= 12
     * $query->filterByCoCliente(array('max' => 12)); // WHERE co_cliente <= 12
     * </code>
     *
     * @see       filterByPessoa()
     *
     * @param     mixed $coCliente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienteQuery The current query, for fluid interface
     */
    public function filterByCoCliente($coCliente = null, $comparison = null)
    {
        if (is_array($coCliente)) {
            $useMinMax = false;
            if (isset($coCliente['min'])) {
                $this->addUsingAlias(ClientePeer::CO_CLIENTE, $coCliente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coCliente['max'])) {
                $this->addUsingAlias(ClientePeer::CO_CLIENTE, $coCliente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientePeer::CO_CLIENTE, $coCliente, $comparison);
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
     * @return ClienteQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClientePeer::DS_RAZAO_SOCIAL, $dsRazaoSocial, $comparison);
    }

    /**
     * Filter the query on the ds_inscricao_estadual column
     *
     * Example usage:
     * <code>
     * $query->filterByDsInscricaoEstadual('fooValue');   // WHERE ds_inscricao_estadual = 'fooValue'
     * $query->filterByDsInscricaoEstadual('%fooValue%'); // WHERE ds_inscricao_estadual LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsInscricaoEstadual The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienteQuery The current query, for fluid interface
     */
    public function filterByDsInscricaoEstadual($dsInscricaoEstadual = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsInscricaoEstadual)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsInscricaoEstadual)) {
                $dsInscricaoEstadual = str_replace('*', '%', $dsInscricaoEstadual);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientePeer::DS_INSCRICAO_ESTADUAL, $dsInscricaoEstadual, $comparison);
    }

    /**
     * Filter the query on the st_suframa column
     *
     * Example usage:
     * <code>
     * $query->filterByStSuframa(true); // WHERE st_suframa = true
     * $query->filterByStSuframa('yes'); // WHERE st_suframa = true
     * </code>
     *
     * @param     boolean|string $stSuframa The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienteQuery The current query, for fluid interface
     */
    public function filterByStSuframa($stSuframa = null, $comparison = null)
    {
        if (is_string($stSuframa)) {
            $stSuframa = in_array(strtolower($stSuframa), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ClientePeer::ST_SUFRAMA, $stSuframa, $comparison);
    }

    /**
     * Filter the query on the ds_ramo_atividade column
     *
     * Example usage:
     * <code>
     * $query->filterByDsRamoAtividade('fooValue');   // WHERE ds_ramo_atividade = 'fooValue'
     * $query->filterByDsRamoAtividade('%fooValue%'); // WHERE ds_ramo_atividade LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsRamoAtividade The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienteQuery The current query, for fluid interface
     */
    public function filterByDsRamoAtividade($dsRamoAtividade = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsRamoAtividade)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsRamoAtividade)) {
                $dsRamoAtividade = str_replace('*', '%', $dsRamoAtividade);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientePeer::DS_RAMO_ATIVIDADE, $dsRamoAtividade, $comparison);
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
     * @return ClienteQuery The current query, for fluid interface
     */
    public function filterByDtCadastro($dtCadastro = null, $comparison = null)
    {
        if (is_array($dtCadastro)) {
            $useMinMax = false;
            if (isset($dtCadastro['min'])) {
                $this->addUsingAlias(ClientePeer::DT_CADASTRO, $dtCadastro['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtCadastro['max'])) {
                $this->addUsingAlias(ClientePeer::DT_CADASTRO, $dtCadastro['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientePeer::DT_CADASTRO, $dtCadastro, $comparison);
    }

    /**
     * Filter the query on the dt_fundacao column
     *
     * Example usage:
     * <code>
     * $query->filterByDtFundacao('2011-03-14'); // WHERE dt_fundacao = '2011-03-14'
     * $query->filterByDtFundacao('now'); // WHERE dt_fundacao = '2011-03-14'
     * $query->filterByDtFundacao(array('max' => 'yesterday')); // WHERE dt_fundacao > '2011-03-13'
     * </code>
     *
     * @param     mixed $dtFundacao The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienteQuery The current query, for fluid interface
     */
    public function filterByDtFundacao($dtFundacao = null, $comparison = null)
    {
        if (is_array($dtFundacao)) {
            $useMinMax = false;
            if (isset($dtFundacao['min'])) {
                $this->addUsingAlias(ClientePeer::DT_FUNDACAO, $dtFundacao['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtFundacao['max'])) {
                $this->addUsingAlias(ClientePeer::DT_FUNDACAO, $dtFundacao['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientePeer::DT_FUNDACAO, $dtFundacao, $comparison);
    }

    /**
     * Filter the query by a related Pessoa object
     *
     * @param   Pessoa|PropelObjectCollection $pessoa The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClienteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPessoa($pessoa, $comparison = null)
    {
        if ($pessoa instanceof Pessoa) {
            return $this
                ->addUsingAlias(ClientePeer::CO_CLIENTE, $pessoa->getCoPessoa(), $comparison);
        } elseif ($pessoa instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientePeer::CO_CLIENTE, $pessoa->toKeyValue('PrimaryKey', 'CoPessoa'), $comparison);
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
     * @return ClienteQuery The current query, for fluid interface
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
     * Filter the query by a related ClienteColaborador object
     *
     * @param   ClienteColaborador|PropelObjectCollection $clienteColaborador  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClienteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClienteColaborador($clienteColaborador, $comparison = null)
    {
        if ($clienteColaborador instanceof ClienteColaborador) {
            return $this
                ->addUsingAlias(ClientePeer::CO_CLIENTE, $clienteColaborador->getCoCliente(), $comparison);
        } elseif ($clienteColaborador instanceof PropelObjectCollection) {
            return $this
                ->useClienteColaboradorQuery()
                ->filterByPrimaryKeys($clienteColaborador->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClienteColaborador() only accepts arguments of type ClienteColaborador or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClienteColaborador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClienteQuery The current query, for fluid interface
     */
    public function joinClienteColaborador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClienteColaborador');

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
            $this->addJoinObject($join, 'ClienteColaborador');
        }

        return $this;
    }

    /**
     * Use the ClienteColaborador relation ClienteColaborador object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClienteColaboradorQuery A secondary query class using the current class as primary query
     */
    public function useClienteColaboradorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClienteColaborador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClienteColaborador', 'ClienteColaboradorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Cliente $cliente Object to remove from the list of results
     *
     * @return ClienteQuery The current query, for fluid interface
     */
    public function prune($cliente = null)
    {
        if ($cliente) {
            $this->addUsingAlias(ClientePeer::CO_CLIENTE, $cliente->getCoCliente(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
