<?php


/**
 * Base class that represents a query for the 'modulo' table.
 *
 *
 *
 * @method ModuloQuery orderByNoModulo($order = Criteria::ASC) Order by the no_modulo column
 * @method ModuloQuery orderByNoExibicao($order = Criteria::ASC) Order by the no_exibicao column
 * @method ModuloQuery orderByDsModulo($order = Criteria::ASC) Order by the ds_modulo column
 * @method ModuloQuery orderByNuOrdem($order = Criteria::ASC) Order by the nu_ordem column
 *
 * @method ModuloQuery groupByNoModulo() Group by the no_modulo column
 * @method ModuloQuery groupByNoExibicao() Group by the no_exibicao column
 * @method ModuloQuery groupByDsModulo() Group by the ds_modulo column
 * @method ModuloQuery groupByNuOrdem() Group by the nu_ordem column
 *
 * @method ModuloQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ModuloQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ModuloQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Modulo findOne(PropelPDO $con = null) Return the first Modulo matching the query
 * @method Modulo findOneOrCreate(PropelPDO $con = null) Return the first Modulo matching the query, or a new Modulo object populated from the query conditions when no match is found
 *
 * @method Modulo findOneByNoExibicao(string $no_exibicao) Return the first Modulo filtered by the no_exibicao column
 * @method Modulo findOneByDsModulo(string $ds_modulo) Return the first Modulo filtered by the ds_modulo column
 * @method Modulo findOneByNuOrdem(int $nu_ordem) Return the first Modulo filtered by the nu_ordem column
 *
 * @method array findByNoModulo(string $no_modulo) Return Modulo objects filtered by the no_modulo column
 * @method array findByNoExibicao(string $no_exibicao) Return Modulo objects filtered by the no_exibicao column
 * @method array findByDsModulo(string $ds_modulo) Return Modulo objects filtered by the ds_modulo column
 * @method array findByNuOrdem(int $nu_ordem) Return Modulo objects filtered by the nu_ordem column
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseModuloQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseModuloQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'semp', $modelName = 'Modulo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ModuloQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ModuloQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ModuloQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ModuloQuery) {
            return $criteria;
        }
        $query = new ModuloQuery();
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
     * @return   Modulo|Modulo[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ModuloPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ModuloPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Modulo A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByNoModulo($key, $con = null)
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
     * @return                 Modulo A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT no_modulo, no_exibicao, ds_modulo, nu_ordem FROM modulo WHERE no_modulo = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Modulo();
            $obj->hydrate($row);
            ModuloPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Modulo|Modulo[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Modulo[]|mixed the list of results, formatted by the current formatter
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
     * @return ModuloQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ModuloPeer::NO_MODULO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ModuloQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ModuloPeer::NO_MODULO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the no_modulo column
     *
     * Example usage:
     * <code>
     * $query->filterByNoModulo('fooValue');   // WHERE no_modulo = 'fooValue'
     * $query->filterByNoModulo('%fooValue%'); // WHERE no_modulo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noModulo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ModuloQuery The current query, for fluid interface
     */
    public function filterByNoModulo($noModulo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noModulo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noModulo)) {
                $noModulo = str_replace('*', '%', $noModulo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ModuloPeer::NO_MODULO, $noModulo, $comparison);
    }

    /**
     * Filter the query on the no_exibicao column
     *
     * Example usage:
     * <code>
     * $query->filterByNoExibicao('fooValue');   // WHERE no_exibicao = 'fooValue'
     * $query->filterByNoExibicao('%fooValue%'); // WHERE no_exibicao LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noExibicao The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ModuloQuery The current query, for fluid interface
     */
    public function filterByNoExibicao($noExibicao = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noExibicao)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noExibicao)) {
                $noExibicao = str_replace('*', '%', $noExibicao);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ModuloPeer::NO_EXIBICAO, $noExibicao, $comparison);
    }

    /**
     * Filter the query on the ds_modulo column
     *
     * Example usage:
     * <code>
     * $query->filterByDsModulo('fooValue');   // WHERE ds_modulo = 'fooValue'
     * $query->filterByDsModulo('%fooValue%'); // WHERE ds_modulo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsModulo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ModuloQuery The current query, for fluid interface
     */
    public function filterByDsModulo($dsModulo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsModulo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dsModulo)) {
                $dsModulo = str_replace('*', '%', $dsModulo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ModuloPeer::DS_MODULO, $dsModulo, $comparison);
    }

    /**
     * Filter the query on the nu_ordem column
     *
     * Example usage:
     * <code>
     * $query->filterByNuOrdem(1234); // WHERE nu_ordem = 1234
     * $query->filterByNuOrdem(array(12, 34)); // WHERE nu_ordem IN (12, 34)
     * $query->filterByNuOrdem(array('min' => 12)); // WHERE nu_ordem >= 12
     * $query->filterByNuOrdem(array('max' => 12)); // WHERE nu_ordem <= 12
     * </code>
     *
     * @param     mixed $nuOrdem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ModuloQuery The current query, for fluid interface
     */
    public function filterByNuOrdem($nuOrdem = null, $comparison = null)
    {
        if (is_array($nuOrdem)) {
            $useMinMax = false;
            if (isset($nuOrdem['min'])) {
                $this->addUsingAlias(ModuloPeer::NU_ORDEM, $nuOrdem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nuOrdem['max'])) {
                $this->addUsingAlias(ModuloPeer::NU_ORDEM, $nuOrdem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ModuloPeer::NU_ORDEM, $nuOrdem, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Modulo $modulo Object to remove from the list of results
     *
     * @return ModuloQuery The current query, for fluid interface
     */
    public function prune($modulo = null)
    {
        if ($modulo) {
            $this->addUsingAlias(ModuloPeer::NO_MODULO, $modulo->getNoModulo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
