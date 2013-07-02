<?php


/**
 * Base static class for performing query and update operations on the 'cliente.cliente' table.
 *
 *
 *
 * @package propel.generator.semp.om
 */
abstract class BaseClientePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'semp';

    /** the table name for this class */
    const TABLE_NAME = 'cliente.cliente';

    /** the related Propel class for this table */
    const OM_CLASS = 'Cliente';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ClienteTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 8;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 8;

    /** the column name for the co_cliente field */
    const CO_CLIENTE = 'cliente.cliente.co_cliente';

    /** the column name for the ds_razao_social field */
    const DS_RAZAO_SOCIAL = 'cliente.cliente.ds_razao_social';

    /** the column name for the ds_inscricao_estadual field */
    const DS_INSCRICAO_ESTADUAL = 'cliente.cliente.ds_inscricao_estadual';

    /** the column name for the st_suframa field */
    const ST_SUFRAMA = 'cliente.cliente.st_suframa';

    /** the column name for the ds_ramo_atividade field */
    const DS_RAMO_ATIVIDADE = 'cliente.cliente.ds_ramo_atividade';

    /** the column name for the dt_cadastro field */
    const DT_CADASTRO = 'cliente.cliente.dt_cadastro';

    /** the column name for the dt_fundacao field */
    const DT_FUNDACAO = 'cliente.cliente.dt_fundacao';

    /** the column name for the co_tributacao field */
    const CO_TRIBUTACAO = 'cliente.cliente.co_tributacao';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Cliente objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Cliente[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ClientePeer::$fieldNames[ClientePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('CoCliente', 'DsRazaoSocial', 'DsInscricaoEstadual', 'StSuframa', 'DsRamoAtividade', 'DtCadastro', 'DtFundacao', 'CoTributacao', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('coCliente', 'dsRazaoSocial', 'dsInscricaoEstadual', 'stSuframa', 'dsRamoAtividade', 'dtCadastro', 'dtFundacao', 'coTributacao', ),
        BasePeer::TYPE_COLNAME => array (ClientePeer::CO_CLIENTE, ClientePeer::DS_RAZAO_SOCIAL, ClientePeer::DS_INSCRICAO_ESTADUAL, ClientePeer::ST_SUFRAMA, ClientePeer::DS_RAMO_ATIVIDADE, ClientePeer::DT_CADASTRO, ClientePeer::DT_FUNDACAO, ClientePeer::CO_TRIBUTACAO, ),
        BasePeer::TYPE_RAW_COLNAME => array ('CO_CLIENTE', 'DS_RAZAO_SOCIAL', 'DS_INSCRICAO_ESTADUAL', 'ST_SUFRAMA', 'DS_RAMO_ATIVIDADE', 'DT_CADASTRO', 'DT_FUNDACAO', 'CO_TRIBUTACAO', ),
        BasePeer::TYPE_FIELDNAME => array ('co_cliente', 'ds_razao_social', 'ds_inscricao_estadual', 'st_suframa', 'ds_ramo_atividade', 'dt_cadastro', 'dt_fundacao', 'co_tributacao', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ClientePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('CoCliente' => 0, 'DsRazaoSocial' => 1, 'DsInscricaoEstadual' => 2, 'StSuframa' => 3, 'DsRamoAtividade' => 4, 'DtCadastro' => 5, 'DtFundacao' => 6, 'CoTributacao' => 7, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('coCliente' => 0, 'dsRazaoSocial' => 1, 'dsInscricaoEstadual' => 2, 'stSuframa' => 3, 'dsRamoAtividade' => 4, 'dtCadastro' => 5, 'dtFundacao' => 6, 'coTributacao' => 7, ),
        BasePeer::TYPE_COLNAME => array (ClientePeer::CO_CLIENTE => 0, ClientePeer::DS_RAZAO_SOCIAL => 1, ClientePeer::DS_INSCRICAO_ESTADUAL => 2, ClientePeer::ST_SUFRAMA => 3, ClientePeer::DS_RAMO_ATIVIDADE => 4, ClientePeer::DT_CADASTRO => 5, ClientePeer::DT_FUNDACAO => 6, ClientePeer::CO_TRIBUTACAO => 7, ),
        BasePeer::TYPE_RAW_COLNAME => array ('CO_CLIENTE' => 0, 'DS_RAZAO_SOCIAL' => 1, 'DS_INSCRICAO_ESTADUAL' => 2, 'ST_SUFRAMA' => 3, 'DS_RAMO_ATIVIDADE' => 4, 'DT_CADASTRO' => 5, 'DT_FUNDACAO' => 6, 'CO_TRIBUTACAO' => 7, ),
        BasePeer::TYPE_FIELDNAME => array ('co_cliente' => 0, 'ds_razao_social' => 1, 'ds_inscricao_estadual' => 2, 'st_suframa' => 3, 'ds_ramo_atividade' => 4, 'dt_cadastro' => 5, 'dt_fundacao' => 6, 'co_tributacao' => 7, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = ClientePeer::getFieldNames($toType);
        $key = isset(ClientePeer::$fieldKeys[$fromType][$name]) ? ClientePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ClientePeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, ClientePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ClientePeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. ClientePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ClientePeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ClientePeer::CO_CLIENTE);
            $criteria->addSelectColumn(ClientePeer::DS_RAZAO_SOCIAL);
            $criteria->addSelectColumn(ClientePeer::DS_INSCRICAO_ESTADUAL);
            $criteria->addSelectColumn(ClientePeer::ST_SUFRAMA);
            $criteria->addSelectColumn(ClientePeer::DS_RAMO_ATIVIDADE);
            $criteria->addSelectColumn(ClientePeer::DT_CADASTRO);
            $criteria->addSelectColumn(ClientePeer::DT_FUNDACAO);
            $criteria->addSelectColumn(ClientePeer::CO_TRIBUTACAO);
        } else {
            $criteria->addSelectColumn($alias . '.co_cliente');
            $criteria->addSelectColumn($alias . '.ds_razao_social');
            $criteria->addSelectColumn($alias . '.ds_inscricao_estadual');
            $criteria->addSelectColumn($alias . '.st_suframa');
            $criteria->addSelectColumn($alias . '.ds_ramo_atividade');
            $criteria->addSelectColumn($alias . '.dt_cadastro');
            $criteria->addSelectColumn($alias . '.dt_fundacao');
            $criteria->addSelectColumn($alias . '.co_tributacao');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ClientePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 Cliente
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ClientePeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return ClientePeer::populateObjects(ClientePeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ClientePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ClientePeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      Cliente $obj A Cliente object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getCoCliente();
            } // if key === null
            ClientePeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Cliente object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Cliente) {
                $key = (string) $value->getCoCliente();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Cliente object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ClientePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Cliente Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ClientePeer::$instances[$key])) {
                return ClientePeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (ClientePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ClientePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to cliente.cliente
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in PedidoPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        PedidoPeer::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = ClientePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ClientePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClientePeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Cliente object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ClientePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ClientePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClientePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ClientePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related ClienteTributacao table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinClienteTributacao(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ClientePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientePeer::CO_TRIBUTACAO, ClienteTributacaoPeer::CO_TRIBUTACAO, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Pessoa table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPessoa(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ClientePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientePeer::CO_CLIENTE, PessoaPeer::CO_PESSOA, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Cliente objects pre-filled with their ClienteTributacao objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cliente objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinClienteTributacao(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientePeer::DATABASE_NAME);
        }

        ClientePeer::addSelectColumns($criteria);
        $startcol = ClientePeer::NUM_HYDRATE_COLUMNS;
        ClienteTributacaoPeer::addSelectColumns($criteria);

        $criteria->addJoin(ClientePeer::CO_TRIBUTACAO, ClienteTributacaoPeer::CO_TRIBUTACAO, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ClientePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ClienteTributacaoPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ClienteTributacaoPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ClienteTributacaoPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ClienteTributacaoPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Cliente) to $obj2 (ClienteTributacao)
                $obj2->addCliente($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Cliente objects pre-filled with their Pessoa objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cliente objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPessoa(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientePeer::DATABASE_NAME);
        }

        ClientePeer::addSelectColumns($criteria);
        $startcol = ClientePeer::NUM_HYDRATE_COLUMNS;
        PessoaPeer::addSelectColumns($criteria);

        $criteria->addJoin(ClientePeer::CO_CLIENTE, PessoaPeer::CO_PESSOA, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ClientePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PessoaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PessoaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PessoaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PessoaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Cliente) to $obj2 (Pessoa)
                // one to one relationship
                $obj1->setPessoa($obj2);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ClientePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientePeer::CO_TRIBUTACAO, ClienteTributacaoPeer::CO_TRIBUTACAO, $join_behavior);

        $criteria->addJoin(ClientePeer::CO_CLIENTE, PessoaPeer::CO_PESSOA, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Cliente objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cliente objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientePeer::DATABASE_NAME);
        }

        ClientePeer::addSelectColumns($criteria);
        $startcol2 = ClientePeer::NUM_HYDRATE_COLUMNS;

        ClienteTributacaoPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClienteTributacaoPeer::NUM_HYDRATE_COLUMNS;

        PessoaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PessoaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ClientePeer::CO_TRIBUTACAO, ClienteTributacaoPeer::CO_TRIBUTACAO, $join_behavior);

        $criteria->addJoin(ClientePeer::CO_CLIENTE, PessoaPeer::CO_PESSOA, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ClientePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ClienteTributacao rows

            $key2 = ClienteTributacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ClienteTributacaoPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ClienteTributacaoPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClienteTributacaoPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Cliente) to the collection in $obj2 (ClienteTributacao)
                $obj2->addCliente($obj1);
            } // if joined row not null

            // Add objects for joined Pessoa rows

            $key3 = PessoaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PessoaPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PessoaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PessoaPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Cliente) to the collection in $obj3 (Pessoa)
                $obj1->setPessoa($obj3);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related ClienteTributacao table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptClienteTributacao(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ClientePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientePeer::CO_CLIENTE, PessoaPeer::CO_PESSOA, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Pessoa table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPessoa(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ClientePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientePeer::CO_TRIBUTACAO, ClienteTributacaoPeer::CO_TRIBUTACAO, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Cliente objects pre-filled with all related objects except ClienteTributacao.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cliente objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptClienteTributacao(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientePeer::DATABASE_NAME);
        }

        ClientePeer::addSelectColumns($criteria);
        $startcol2 = ClientePeer::NUM_HYDRATE_COLUMNS;

        PessoaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PessoaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ClientePeer::CO_CLIENTE, PessoaPeer::CO_PESSOA, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ClientePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Pessoa rows

                $key2 = PessoaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PessoaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = PessoaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PessoaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Cliente) to the collection in $obj2 (Pessoa)
                $obj1->setPessoa($obj2);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Cliente objects pre-filled with all related objects except Pessoa.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cliente objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPessoa(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientePeer::DATABASE_NAME);
        }

        ClientePeer::addSelectColumns($criteria);
        $startcol2 = ClientePeer::NUM_HYDRATE_COLUMNS;

        ClienteTributacaoPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClienteTributacaoPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ClientePeer::CO_TRIBUTACAO, ClienteTributacaoPeer::CO_TRIBUTACAO, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ClientePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ClienteTributacao rows

                $key2 = ClienteTributacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ClienteTributacaoPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ClienteTributacaoPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClienteTributacaoPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Cliente) to the collection in $obj2 (ClienteTributacao)
                $obj2->addCliente($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(ClientePeer::DATABASE_NAME)->getTable(ClientePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseClientePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseClientePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ClienteTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return ClientePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Cliente or Criteria object.
     *
     * @param      mixed $values Criteria or Cliente object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Cliente object
        }


        // Set the correct dbName
        $criteria->setDbName(ClientePeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Cliente or Criteria object.
     *
     * @param      mixed $values Criteria or Cliente object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ClientePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ClientePeer::CO_CLIENTE);
            $value = $criteria->remove(ClientePeer::CO_CLIENTE);
            if ($value) {
                $selectCriteria->add(ClientePeer::CO_CLIENTE, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ClientePeer::TABLE_NAME);
            }

        } else { // $values is Cliente object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ClientePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the cliente.cliente table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ClientePeer::TABLE_NAME, $con, ClientePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClientePeer::clearInstancePool();
            ClientePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Cliente or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Cliente object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ClientePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Cliente) { // it's a model object
            // invalidate the cache for this single object
            ClientePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ClientePeer::DATABASE_NAME);
            $criteria->add(ClientePeer::CO_CLIENTE, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ClientePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ClientePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ClientePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Cliente object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Cliente $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ClientePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ClientePeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(ClientePeer::DATABASE_NAME, ClientePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Cliente
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ClientePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ClientePeer::DATABASE_NAME);
        $criteria->add(ClientePeer::CO_CLIENTE, $pk);

        $v = ClientePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Cliente[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ClientePeer::DATABASE_NAME);
            $criteria->add(ClientePeer::CO_CLIENTE, $pks, Criteria::IN);
            $objs = ClientePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseClientePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseClientePeer::buildTableMap();

