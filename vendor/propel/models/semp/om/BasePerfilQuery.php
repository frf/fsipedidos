<?php


/**
 * Base class that represents a query for the 'perfil' table.
 *
 *
 *
 * @method PerfilQuery orderByCoPerfil($order = Criteria::ASC) Order by the co_perfil column
 * @method PerfilQuery orderByNoPerfil($order = Criteria::ASC) Order by the no_perfil column
 * @method PerfilQuery orderByDsPerfil($order = Criteria::ASC) Order by the ds_perfil column
 * @method PerfilQuery orderByStPerfil($order = Criteria::ASC) Order by the st_perfil column
 *
 * @method PerfilQuery groupByCoPerfil() Group by the co_perfil column
 * @method PerfilQuery groupByNoPerfil() Group by the no_perfil column
 * @method PerfilQuery groupByDsPerfil() Group by the ds_perfil column
 * @method PerfilQuery groupByStPerfil() Group by the st_perfil column
 *
 * @method PerfilQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PerfilQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PerfilQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PerfilQuery leftJoinColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Colaborador relation
 * @method PerfilQuery rightJoinColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Colaborador relation
 * @method PerfilQuery innerJoinColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the Colaborador relation
 *
 * @method PerfilQuery leftJoinPermissao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Permissao relation
 * @method PerfilQuery rightJoinPermissao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Permissao relation
 * @method PerfilQuery innerJoinPermissao($relationAlias = null) Adds a INNER JOIN clause to the query using the Permissao relation
 *
 * @method PerfilQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method PerfilQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method PerfilQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method Perfil findOne(PropelPDO $con = null) Return the first Perfil matching the query
 * @method Perfil findOneOrCreate(PropelPDO $con = null) Return the first Perfil matching the query, or a new Perfil object populated from the query conditions when no match is found
 *
 * @method Perfil findOneByNoPerfil(string $no_perfil) Return the first Perfil filtered by the no_perfil column
 * @method Perfil findOneByDsPerfil(string $ds_perfil) Return the first Perfil filtered by the ds_perfil column
 * @method Perfil findOneByStPerfil(boolean $st_perfil) Return the first Perfil filtered by the st_perfil column
 *
 * @method array findByCoPerfil(int $co_perfil) Return Perfil objects filtered by the co_perfil column
 * @method array findByNoPerfil(string $no_perfil) Return Perfil objects filtered by the no_perfil column
 * @method array findByDsPerfil(string $ds_perfil) Return Perfil objects filtered by the ds_perfil column
 * @method array findByStPerfil(boolean $st_perfil) Return Perfil objects filtered by the st_perfil column
 *
 * @package    propel.generator.semp.om
 */
abstract class BasePerfilQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePerfilQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'Perfil', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PerfilQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PerfilQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PerfilQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PerfilQuery) {
            return $criteria;
        }
        $query = new PerfilQuery();
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
     * @return   Perfil|Perfil[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PerfilPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PerfilPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Perfil A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCoPerfil($key, $con = null)
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
     * @return                 Perfil A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT co_perfil, no_perfil, ds_perfil, st_perfil FROM perfil WHERE co_perfil = :p0';
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
            $obj = new Perfil();
            $obj->hydrate($row);
            PerfilPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Perfil|Perfil[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Perfil[]|mixed the list of results, formatted by the current formatter
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
     * @return PerfilQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PerfilPeer::CO_PERFIL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PerfilPeer::CO_PERFIL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the co_perfil column
     *
     * Example usage:
     * <code>
     * $query->filterByCoPerfil(1234); // WHERE co_perfil = 1234
     * $query->filterByCoPerfil(array(12, 34)); // WHERE co_perfil IN (12, 34)
     * $query->filterByCoPerfil(array('min' => 12)); // WHERE co_perfil >= 12
     * $query->filterByCoPerfil(array('max' => 12)); // WHERE co_perfil <= 12
     * </code>
     *
     * @param     mixed $coPerfil The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function filterByCoPerfil($coPerfil = null, $comparison = null)
    {
        if (is_array($coPerfil)) {
            $useMinMax = false;
            if (isset($coPerfil['min'])) {
                $this->addUsingAlias(PerfilPeer::CO_PERFIL, $coPerfil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coPerfil['max'])) {
                $this->addUsingAlias(PerfilPeer::CO_PERFIL, $coPerfil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PerfilPeer::CO_PERFIL, $coPerfil, $comparison);
    }

    /**
     * Filter the query on the no_perfil column
     *
     * Example usage:
     * <code>
     * $query->filterByNoPerfil('fooValue');   // WHERE no_perfil = 'fooValue'
     * $query->filterByNoPerfil('%fooValue%'); // WHERE no_perfil LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noPerfil The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function filterByNoPerfil($noPerfil = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noPerfil)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noPerfil)) {
                $noPerfil = str_replace('*', '%', $noPerfil);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PerfilPeer::NO_PERFIL, $noPerfil, $comparison);
    }

    /**
     * Filter the query on the ds_perfil column
     *
     * Example usage:
     * <code>
     * $query->filterByDsPerfil('fooValue');   // WHERE ds_perfil = 'fooValue'
     * $query->filterByDsPerfil('%fooValue%'); // WHERE ds_perfil LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsPerfil The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function filterByDsPerfil($dsPerfil = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsPerfil)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsPerfil)) {
                $dsPerfil = str_replace('*', '%', $dsPerfil);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PerfilPeer::DS_PERFIL, $dsPerfil, $comparison);
    }

    /**
     * Filter the query on the st_perfil column
     *
     * Example usage:
     * <code>
     * $query->filterByStPerfil(true); // WHERE st_perfil = true
     * $query->filterByStPerfil('yes'); // WHERE st_perfil = true
     * </code>
     *
     * @param     boolean|string $stPerfil The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function filterByStPerfil($stPerfil = null, $comparison = null)
    {
        if (is_string($stPerfil)) {
            $stPerfil = in_array(strtolower($stPerfil), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PerfilPeer::ST_PERFIL, $stPerfil, $comparison);
    }

    /**
     * Filter the query by a related Colaborador object
     *
     * @param   Colaborador|PropelObjectCollection $colaborador  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PerfilQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByColaborador($colaborador, $comparison = null)
    {
        if ($colaborador instanceof Colaborador) {
            return $this
                ->addUsingAlias(PerfilPeer::CO_PERFIL, $colaborador->getCoPerfil(), $comparison);
        } elseif ($colaborador instanceof PropelObjectCollection) {
            return $this
                ->useColaboradorQuery()
                ->filterByPrimaryKeys($colaborador->getPrimaryKeys())
                ->endUse();
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
     * @return PerfilQuery The current query, for fluid interface
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
     * Filter the query by a related Permissao object
     *
     * @param   Permissao|PropelObjectCollection $permissao  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PerfilQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPermissao($permissao, $comparison = null)
    {
        if ($permissao instanceof Permissao) {
            return $this
                ->addUsingAlias(PerfilPeer::CO_PERFIL, $permissao->getCoPerfil(), $comparison);
        } elseif ($permissao instanceof PropelObjectCollection) {
            return $this
                ->usePermissaoQuery()
                ->filterByPrimaryKeys($permissao->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPermissao() only accepts arguments of type Permissao or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Permissao relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function joinPermissao($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Permissao');

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
            $this->addJoinObject($join, 'Permissao');
        }

        return $this;
    }

    /**
     * Use the Permissao relation Permissao object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PermissaoQuery A secondary query class using the current class as primary query
     */
    public function usePermissaoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPermissao($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Permissao', 'PermissaoQuery');
    }

    /**
     * Filter the query by a related Usuario object
     *
     * @param   Usuario|PropelObjectCollection $usuario  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PerfilQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsuario($usuario, $comparison = null)
    {
        if ($usuario instanceof Usuario) {
            return $this
                ->addUsingAlias(PerfilPeer::CO_PERFIL, $usuario->getCoPerfil(), $comparison);
        } elseif ($usuario instanceof PropelObjectCollection) {
            return $this
                ->useUsuarioQuery()
                ->filterByPrimaryKeys($usuario->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsuario() only accepts arguments of type Usuario or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Usuario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function joinUsuario($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Usuario');

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
            $this->addJoinObject($join, 'Usuario');
        }

        return $this;
    }

    /**
     * Use the Usuario relation Usuario object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UsuarioQuery A secondary query class using the current class as primary query
     */
    public function useUsuarioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsuario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Usuario', 'UsuarioQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Perfil $perfil Object to remove from the list of results
     *
     * @return PerfilQuery The current query, for fluid interface
     */
    public function prune($perfil = null)
    {
        if ($perfil) {
            $this->addUsingAlias(PerfilPeer::CO_PERFIL, $perfil->getCoPerfil(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}