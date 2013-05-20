<?php


/**
 * Base class that represents a query for the 'cliente.cliente_colaborador' table.
 *
 *
 *
 * @method ClienteColaboradorQuery orderByCoCliente($order = Criteria::ASC) Order by the co_cliente column
 * @method ClienteColaboradorQuery orderByCoColaborador($order = Criteria::ASC) Order by the co_colaborador column
 *
 * @method ClienteColaboradorQuery groupByCoCliente() Group by the co_cliente column
 * @method ClienteColaboradorQuery groupByCoColaborador() Group by the co_colaborador column
 *
 * @method ClienteColaboradorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClienteColaboradorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClienteColaboradorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClienteColaboradorQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method ClienteColaboradorQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method ClienteColaboradorQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method ClienteColaboradorQuery leftJoinColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Colaborador relation
 * @method ClienteColaboradorQuery rightJoinColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Colaborador relation
 * @method ClienteColaboradorQuery innerJoinColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the Colaborador relation
 *
 * @method ClienteColaborador findOne(PropelPDO $con = null) Return the first ClienteColaborador matching the query
 * @method ClienteColaborador findOneOrCreate(PropelPDO $con = null) Return the first ClienteColaborador matching the query, or a new ClienteColaborador object populated from the query conditions when no match is found
 *
 * @method ClienteColaborador findOneByCoCliente(int $co_cliente) Return the first ClienteColaborador filtered by the co_cliente column
 * @method ClienteColaborador findOneByCoColaborador(int $co_colaborador) Return the first ClienteColaborador filtered by the co_colaborador column
 *
 * @method array findByCoCliente(int $co_cliente) Return ClienteColaborador objects filtered by the co_cliente column
 * @method array findByCoColaborador(int $co_colaborador) Return ClienteColaborador objects filtered by the co_colaborador column
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseClienteColaboradorQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClienteColaboradorQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'ClienteColaborador', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClienteColaboradorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClienteColaboradorQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClienteColaboradorQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClienteColaboradorQuery) {
            return $criteria;
        }
        $query = new ClienteColaboradorQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$co_cliente, $co_colaborador]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ClienteColaborador|ClienteColaborador[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClienteColaboradorPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClienteColaboradorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ClienteColaborador A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT co_cliente, co_colaborador FROM cliente.cliente_colaborador WHERE co_cliente = :p0 AND co_colaborador = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ClienteColaborador();
            $obj->hydrate($row);
            ClienteColaboradorPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ClienteColaborador|ClienteColaborador[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ClienteColaborador[]|mixed the list of results, formatted by the current formatter
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
     * @return ClienteColaboradorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ClienteColaboradorPeer::CO_CLIENTE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ClienteColaboradorPeer::CO_COLABORADOR, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClienteColaboradorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ClienteColaboradorPeer::CO_CLIENTE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ClienteColaboradorPeer::CO_COLABORADOR, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByCliente()
     *
     * @param     mixed $coCliente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienteColaboradorQuery The current query, for fluid interface
     */
    public function filterByCoCliente($coCliente = null, $comparison = null)
    {
        if (is_array($coCliente)) {
            $useMinMax = false;
            if (isset($coCliente['min'])) {
                $this->addUsingAlias(ClienteColaboradorPeer::CO_CLIENTE, $coCliente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coCliente['max'])) {
                $this->addUsingAlias(ClienteColaboradorPeer::CO_CLIENTE, $coCliente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteColaboradorPeer::CO_CLIENTE, $coCliente, $comparison);
    }

    /**
     * Filter the query on the co_colaborador column
     *
     * Example usage:
     * <code>
     * $query->filterByCoColaborador(1234); // WHERE co_colaborador = 1234
     * $query->filterByCoColaborador(array(12, 34)); // WHERE co_colaborador IN (12, 34)
     * $query->filterByCoColaborador(array('min' => 12)); // WHERE co_colaborador >= 12
     * $query->filterByCoColaborador(array('max' => 12)); // WHERE co_colaborador <= 12
     * </code>
     *
     * @see       filterByColaborador()
     *
     * @param     mixed $coColaborador The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienteColaboradorQuery The current query, for fluid interface
     */
    public function filterByCoColaborador($coColaborador = null, $comparison = null)
    {
        if (is_array($coColaborador)) {
            $useMinMax = false;
            if (isset($coColaborador['min'])) {
                $this->addUsingAlias(ClienteColaboradorPeer::CO_COLABORADOR, $coColaborador['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coColaborador['max'])) {
                $this->addUsingAlias(ClienteColaboradorPeer::CO_COLABORADOR, $coColaborador['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteColaboradorPeer::CO_COLABORADOR, $coColaborador, $comparison);
    }

    /**
     * Filter the query by a related Cliente object
     *
     * @param   Cliente|PropelObjectCollection $cliente The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClienteColaboradorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCliente($cliente, $comparison = null)
    {
        if ($cliente instanceof Cliente) {
            return $this
                ->addUsingAlias(ClienteColaboradorPeer::CO_CLIENTE, $cliente->getCoCliente(), $comparison);
        } elseif ($cliente instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClienteColaboradorPeer::CO_CLIENTE, $cliente->toKeyValue('PrimaryKey', 'CoCliente'), $comparison);
        } else {
            throw new PropelException('filterByCliente() only accepts arguments of type Cliente or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClienteColaboradorQuery The current query, for fluid interface
     */
    public function joinCliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cliente');

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
            $this->addJoinObject($join, 'Cliente');
        }

        return $this;
    }

    /**
     * Use the Cliente relation Cliente object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClienteQuery A secondary query class using the current class as primary query
     */
    public function useClienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cliente', 'ClienteQuery');
    }

    /**
     * Filter the query by a related Colaborador object
     *
     * @param   Colaborador|PropelObjectCollection $colaborador The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClienteColaboradorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByColaborador($colaborador, $comparison = null)
    {
        if ($colaborador instanceof Colaborador) {
            return $this
                ->addUsingAlias(ClienteColaboradorPeer::CO_COLABORADOR, $colaborador->getCoColaborador(), $comparison);
        } elseif ($colaborador instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClienteColaboradorPeer::CO_COLABORADOR, $colaborador->toKeyValue('PrimaryKey', 'CoColaborador'), $comparison);
        } else {
            throw new PropelException('filterByColaborador() only accepts arguments of type Colaborador or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Colaborador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClienteColaboradorQuery The current query, for fluid interface
     */
    public function joinColaborador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Colaborador');

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
            $this->addJoinObject($join, 'Colaborador');
        }

        return $this;
    }

    /**
     * Use the Colaborador relation Colaborador object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ColaboradorQuery A secondary query class using the current class as primary query
     */
    public function useColaboradorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinColaborador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Colaborador', 'ColaboradorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ClienteColaborador $clienteColaborador Object to remove from the list of results
     *
     * @return ClienteColaboradorQuery The current query, for fluid interface
     */
    public function prune($clienteColaborador = null)
    {
        if ($clienteColaborador) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ClienteColaboradorPeer::CO_CLIENTE), $clienteColaborador->getCoCliente(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ClienteColaboradorPeer::CO_COLABORADOR), $clienteColaborador->getCoColaborador(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
