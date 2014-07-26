--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

--
-- Name: cliente; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA cliente;


--
-- Name: colaboradores; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA colaboradores;


--
-- Name: faturamento; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA faturamento;


--
-- Name: pedido; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA pedido;


--
-- Name: representada; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA representada;


--
-- Name: transportadora; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA transportadora;


SET search_path = cliente, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cliente; Type: TABLE; Schema: cliente; Owner: -; Tablespace: 
--

CREATE TABLE cliente (
    co_cliente integer NOT NULL,
    ds_razao_social character varying(255),
    ds_inscricao_estadual character varying(255),
    st_suframa boolean,
    ds_ramo_atividade text,
    dt_cadastro timestamp without time zone DEFAULT now(),
    dt_fundacao timestamp without time zone,
    co_tributacao integer
);


--
-- Name: cliente_co_cliente_seq; Type: SEQUENCE; Schema: cliente; Owner: -
--

CREATE SEQUENCE cliente_co_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: cliente_co_cliente_seq; Type: SEQUENCE SET; Schema: cliente; Owner: -
--

SELECT pg_catalog.setval('cliente_co_cliente_seq', 1, false);


--
-- Name: cliente_colaborador; Type: TABLE; Schema: cliente; Owner: -; Tablespace: 
--

CREATE TABLE cliente_colaborador (
    co_cliente integer NOT NULL,
    co_colaborador integer NOT NULL
);


--
-- Name: cliente_tributacao; Type: TABLE; Schema: cliente; Owner: -; Tablespace: 
--

CREATE TABLE cliente_tributacao (
    co_tributacao integer NOT NULL,
    no_tributacao character varying(200)
);


--
-- Name: cliente_tributacao_co_tributacao_seq; Type: SEQUENCE; Schema: cliente; Owner: -
--

CREATE SEQUENCE cliente_tributacao_co_tributacao_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: cliente_tributacao_co_tributacao_seq; Type: SEQUENCE OWNED BY; Schema: cliente; Owner: -
--

ALTER SEQUENCE cliente_tributacao_co_tributacao_seq OWNED BY cliente_tributacao.co_tributacao;


--
-- Name: cliente_tributacao_co_tributacao_seq; Type: SEQUENCE SET; Schema: cliente; Owner: -
--

SELECT pg_catalog.setval('cliente_tributacao_co_tributacao_seq', 4, true);


SET search_path = colaboradores, pg_catalog;

--
-- Name: colaborador; Type: TABLE; Schema: colaboradores; Owner: -; Tablespace: 
--

CREATE TABLE colaborador (
    co_colaborador integer NOT NULL,
    ds_email character varying(250),
    tp_administrador boolean,
    ds_telefone character varying(33)
);


--
-- Name: colaborador_co_colaborador_seq; Type: SEQUENCE; Schema: colaboradores; Owner: -
--

CREATE SEQUENCE colaborador_co_colaborador_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: colaborador_co_colaborador_seq; Type: SEQUENCE SET; Schema: colaboradores; Owner: -
--

SELECT pg_catalog.setval('colaborador_co_colaborador_seq', 4, true);


SET search_path = pedido, pg_catalog;

--
-- Name: boleto; Type: TABLE; Schema: pedido; Owner: -; Tablespace: 
--

CREATE TABLE boleto (
    co_boleto integer NOT NULL,
    nu_boleto character varying(250),
    no_boleto character varying(200),
    co_pedido integer
);


--
-- Name: boleto_co_boleto_seq; Type: SEQUENCE; Schema: pedido; Owner: -
--

CREATE SEQUENCE boleto_co_boleto_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: boleto_co_boleto_seq; Type: SEQUENCE OWNED BY; Schema: pedido; Owner: -
--

ALTER SEQUENCE boleto_co_boleto_seq OWNED BY boleto.co_boleto;


--
-- Name: boleto_co_boleto_seq; Type: SEQUENCE SET; Schema: pedido; Owner: -
--

SELECT pg_catalog.setval('boleto_co_boleto_seq', 3, true);


--
-- Name: nota_fiscal; Type: TABLE; Schema: pedido; Owner: -; Tablespace: 
--

CREATE TABLE nota_fiscal (
    co_nota integer NOT NULL,
    nu_nota_fiscal character varying(250),
    no_file_nota_fiscal character varying(200),
    co_pedido integer,
    co_tipo_nota integer DEFAULT 1
);


--
-- Name: nota_fiscal_co_nota_seq; Type: SEQUENCE; Schema: pedido; Owner: -
--

CREATE SEQUENCE nota_fiscal_co_nota_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: nota_fiscal_co_nota_seq; Type: SEQUENCE OWNED BY; Schema: pedido; Owner: -
--

ALTER SEQUENCE nota_fiscal_co_nota_seq OWNED BY nota_fiscal.co_nota;


--
-- Name: nota_fiscal_co_nota_seq; Type: SEQUENCE SET; Schema: pedido; Owner: -
--

SELECT pg_catalog.setval('nota_fiscal_co_nota_seq', 6, true);


--
-- Name: pedido; Type: TABLE; Schema: pedido; Owner: -; Tablespace: 
--

CREATE TABLE pedido (
    co_representada integer,
    co_pedido integer NOT NULL,
    co_cliente integer,
    dt_pedido timestamp without time zone DEFAULT now(),
    co_pedido_cliente character varying(100),
    co_status integer,
    dt_status timestamp without time zone DEFAULT now(),
    dt_emissao timestamp without time zone,
    co_colaborador integer,
    co_transportadora integer,
    ds_informacao text
);


--
-- Name: pedido_co_pedido_seq; Type: SEQUENCE; Schema: pedido; Owner: -
--

CREATE SEQUENCE pedido_co_pedido_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: pedido_co_pedido_seq; Type: SEQUENCE OWNED BY; Schema: pedido; Owner: -
--

ALTER SEQUENCE pedido_co_pedido_seq OWNED BY pedido.co_pedido;


--
-- Name: pedido_co_pedido_seq; Type: SEQUENCE SET; Schema: pedido; Owner: -
--

SELECT pg_catalog.setval('pedido_co_pedido_seq', 28, true);


--
-- Name: pedido_status; Type: TABLE; Schema: pedido; Owner: -; Tablespace: 
--

CREATE TABLE pedido_status (
    co_status integer NOT NULL,
    no_status character varying(200),
    st_status boolean
);


--
-- Name: pedido_status_co_status_seq; Type: SEQUENCE; Schema: pedido; Owner: -
--

CREATE SEQUENCE pedido_status_co_status_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: pedido_status_co_status_seq; Type: SEQUENCE OWNED BY; Schema: pedido; Owner: -
--

ALTER SEQUENCE pedido_status_co_status_seq OWNED BY pedido_status.co_status;


--
-- Name: pedido_status_co_status_seq; Type: SEQUENCE SET; Schema: pedido; Owner: -
--

SELECT pg_catalog.setval('pedido_status_co_status_seq', 7, true);


--
-- Name: produto_pedido; Type: TABLE; Schema: pedido; Owner: -; Tablespace: 
--

CREATE TABLE produto_pedido (
    co_pedido integer NOT NULL,
    qnt_original integer DEFAULT 0,
    qnt_entregue integer DEFAULT 0,
    dt_entrega_parcial timestamp without time zone,
    vl_original numeric(10,2) DEFAULT 0,
    vl_desconto character varying(100) DEFAULT 0,
    vl_comissao character varying(100) DEFAULT 0,
    co_produto integer NOT NULL,
    vl_ipi character varying(100),
    dt_cadastro timestamp without time zone DEFAULT now(),
    tp_moeda integer DEFAULT 1,
    no_medida character varying(200)
);


--
-- Name: transportadora_pedido; Type: TABLE; Schema: pedido; Owner: -; Tablespace: 
--

CREATE TABLE transportadora_pedido (
    co_pedido integer NOT NULL,
    co_transportadora integer NOT NULL
);


SET search_path = public, pg_catalog;

--
-- Name: email; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE email (
    co_email integer NOT NULL,
    co_pessoa integer NOT NULL,
    tp_email character varying(100) DEFAULT 1,
    ds_email character varying(120) NOT NULL,
    dt_cadastro timestamp without time zone DEFAULT now() NOT NULL,
    dt_alteracao timestamp without time zone,
    no_email character varying(200)
);


--
-- Name: email_co_email_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE email_co_email_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: email_co_email_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE email_co_email_seq OWNED BY email.co_email;


--
-- Name: email_co_email_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('email_co_email_seq', 10, true);


--
-- Name: sistema_co_sistema_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sistema_co_sistema_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: sistema_co_sistema_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('sistema_co_sistema_seq', 1, false);


--
-- Name: empresa; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE empresa (
    co_empresa integer DEFAULT nextval('sistema_co_sistema_seq'::regclass) NOT NULL,
    no_empresa character varying(200),
    no_dominio character varying(200)
);


--
-- Name: endereco; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE endereco (
    co_pessoa integer NOT NULL,
    no_endereco character varying(150),
    ds_endereco character varying(255),
    no_logradouro character varying(255),
    nu_endereco character varying(30),
    ds_complemento character varying(150),
    co_municipio integer,
    no_municipio character varying(100),
    ds_estado character varying(100),
    co_pais integer,
    st_exterior boolean DEFAULT false NOT NULL,
    ds_ponto_referencia character varying(150),
    ds_observacao text,
    dt_cadastro timestamp without time zone DEFAULT now() NOT NULL,
    co_usuario_cadastro integer,
    dt_alteracao timestamp without time zone,
    co_usuario_alteracao integer,
    nu_latitude character varying(100),
    nu_longitude character varying(100),
    tp_endereco integer DEFAULT 1 NOT NULL,
    no_bairro character varying(50),
    nu_cep character(9),
    co_estado character(2),
    co_endereco integer NOT NULL
);


--
-- Name: endereco_co_endereco_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE endereco_co_endereco_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: endereco_co_endereco_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE endereco_co_endereco_seq OWNED BY endereco.co_endereco;


--
-- Name: endereco_co_endereco_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('endereco_co_endereco_seq', 12, true);


--
-- Name: modulo; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE modulo (
    no_modulo character varying(50) NOT NULL,
    no_exibicao character varying(100) NOT NULL,
    ds_modulo text,
    nu_ordem integer DEFAULT 0
);


--
-- Name: moeda; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE moeda (
    co_moeda integer NOT NULL,
    no_moeda character varying(30)
);


--
-- Name: moeda_co_moeda_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE moeda_co_moeda_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: moeda_co_moeda_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE moeda_co_moeda_seq OWNED BY moeda.co_moeda;


--
-- Name: moeda_co_moeda_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('moeda_co_moeda_seq', 1, false);


--
-- Name: perfil_co_perfil_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE perfil_co_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: perfil_co_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('perfil_co_perfil_seq', 1, false);


--
-- Name: perfil; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE perfil (
    co_perfil integer DEFAULT nextval('perfil_co_perfil_seq'::regclass) NOT NULL,
    no_perfil character varying(150),
    ds_perfil text,
    st_perfil boolean DEFAULT true NOT NULL
);


--
-- Name: permissao; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE permissao (
    co_perfil integer NOT NULL,
    dt_alteracao timestamp without time zone,
    co_usuario_alteracao integer,
    co_recurso integer NOT NULL,
    st_permissao boolean DEFAULT true NOT NULL,
    dt_cadastro timestamp with time zone DEFAULT now() NOT NULL,
    co_usuario_cadastro integer
);


--
-- Name: pessoa_co_pessoa_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE pessoa_co_pessoa_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: pessoa_co_pessoa_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('pessoa_co_pessoa_seq', 49, true);


--
-- Name: pessoa; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE pessoa (
    co_pessoa integer DEFAULT nextval('pessoa_co_pessoa_seq'::regclass) NOT NULL,
    no_pessoa character varying(200) NOT NULL,
    nu_cpf character varying(25),
    nu_cnpj character varying(25),
    co_empresa integer
);


--
-- Name: recurso_co_recurso_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE recurso_co_recurso_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: recurso_co_recurso_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('recurso_co_recurso_seq', 1, false);


--
-- Name: recurso; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE recurso (
    co_recurso integer DEFAULT nextval('recurso_co_recurso_seq'::regclass) NOT NULL,
    no_recurso character varying(150),
    ds_recurso character varying(255),
    tp_recurso integer,
    dt_cadastro timestamp without time zone DEFAULT now() NOT NULL,
    co_usuario_cadastro integer,
    dt_alteracao timestamp without time zone,
    co_usuario_alteracao integer
);


--
-- Name: telefone; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE telefone (
    co_telefone integer NOT NULL,
    co_pessoa integer NOT NULL,
    no_telefone character varying(200),
    nu_ddi character varying(4),
    nu_ddd character(2),
    nu_telefone character varying(10) NOT NULL,
    tp_telefone integer DEFAULT 1 NOT NULL,
    ds_telefone character varying(50),
    dt_cadastro timestamp without time zone DEFAULT now() NOT NULL
);


--
-- Name: telefone_co_telefone_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE telefone_co_telefone_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: telefone_co_telefone_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE telefone_co_telefone_seq OWNED BY telefone.co_telefone;


--
-- Name: telefone_co_telefone_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('telefone_co_telefone_seq', 7, true);


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE usuario (
    ds_password character varying(200),
    dt_ultimo_login timestamp without time zone,
    ds_login character varying(120),
    co_perfil integer,
    co_pessoa integer NOT NULL,
    co_usuario integer NOT NULL
);


--
-- Name: usuario_co_usuario_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE usuario_co_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: usuario_co_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('usuario_co_usuario_seq', 10, true);


--
-- Name: usuario_co_usuario_seq1; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE usuario_co_usuario_seq1
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: usuario_co_usuario_seq1; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE usuario_co_usuario_seq1 OWNED BY usuario.co_usuario;


--
-- Name: usuario_co_usuario_seq1; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('usuario_co_usuario_seq1', 2, true);


SET search_path = representada, pg_catalog;

--
-- Name: produto_imagem; Type: TABLE; Schema: representada; Owner: -; Tablespace: 
--

CREATE TABLE produto_imagem (
    co_imagem integer NOT NULL,
    co_produto integer NOT NULL,
    no_imagem character varying(200),
    dt_cadastro timestamp without time zone DEFAULT now(),
    co_ordem integer
);


--
-- Name: produto_imagem_co_imagem_seq; Type: SEQUENCE; Schema: representada; Owner: -
--

CREATE SEQUENCE produto_imagem_co_imagem_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: produto_imagem_co_imagem_seq; Type: SEQUENCE OWNED BY; Schema: representada; Owner: -
--

ALTER SEQUENCE produto_imagem_co_imagem_seq OWNED BY produto_imagem.co_imagem;


--
-- Name: produto_imagem_co_imagem_seq; Type: SEQUENCE SET; Schema: representada; Owner: -
--

SELECT pg_catalog.setval('produto_imagem_co_imagem_seq', 1, false);


--
-- Name: produto_representada; Type: TABLE; Schema: representada; Owner: -; Tablespace: 
--

CREATE TABLE produto_representada (
    co_produto integer NOT NULL,
    cod_produto character varying(10),
    no_produto character varying(200),
    co_representada integer NOT NULL,
    ds_valor character varying(10),
    no_unidade character varying(10),
    no_imagem character varying(200),
    tp_moeda integer DEFAULT 1,
    ncm_sh character varying
);


--
-- Name: produto_representada_co_produto_seq; Type: SEQUENCE; Schema: representada; Owner: -
--

CREATE SEQUENCE produto_representada_co_produto_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: produto_representada_co_produto_seq; Type: SEQUENCE OWNED BY; Schema: representada; Owner: -
--

ALTER SEQUENCE produto_representada_co_produto_seq OWNED BY produto_representada.co_produto;


--
-- Name: produto_representada_co_produto_seq; Type: SEQUENCE SET; Schema: representada; Owner: -
--

SELECT pg_catalog.setval('produto_representada_co_produto_seq', 64, true);


--
-- Name: representada; Type: TABLE; Schema: representada; Owner: -; Tablespace: 
--

CREATE TABLE representada (
    co_representada integer NOT NULL,
    ds_razao_social character varying(255),
    dt_cadastro timestamp without time zone DEFAULT now(),
    nu_comissao character varying(255),
    ds_info_adicionais text
);


--
-- Name: representada_co_representada_seq; Type: SEQUENCE; Schema: representada; Owner: -
--

CREATE SEQUENCE representada_co_representada_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: representada_co_representada_seq; Type: SEQUENCE SET; Schema: representada; Owner: -
--

SELECT pg_catalog.setval('representada_co_representada_seq', 3, true);


--
-- Name: representada_colaborador; Type: TABLE; Schema: representada; Owner: -; Tablespace: 
--

CREATE TABLE representada_colaborador (
    co_representada integer NOT NULL,
    co_colaborador integer NOT NULL,
    nu_comissao character varying(3) NOT NULL
);


SET search_path = transportadora, pg_catalog;

--
-- Name: transportadora; Type: TABLE; Schema: transportadora; Owner: -; Tablespace: 
--

CREATE TABLE transportadora (
    co_transportadora integer NOT NULL,
    no_transportadora character varying(200),
    no_site character varying(200)
);


--
-- Name: transportadora_co_transportadora_seq; Type: SEQUENCE; Schema: transportadora; Owner: -
--

CREATE SEQUENCE transportadora_co_transportadora_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: transportadora_co_transportadora_seq; Type: SEQUENCE OWNED BY; Schema: transportadora; Owner: -
--

ALTER SEQUENCE transportadora_co_transportadora_seq OWNED BY transportadora.co_transportadora;


--
-- Name: transportadora_co_transportadora_seq; Type: SEQUENCE SET; Schema: transportadora; Owner: -
--

SELECT pg_catalog.setval('transportadora_co_transportadora_seq', 3, true);


SET search_path = cliente, pg_catalog;

--
-- Name: co_tributacao; Type: DEFAULT; Schema: cliente; Owner: -
--

ALTER TABLE ONLY cliente_tributacao ALTER COLUMN co_tributacao SET DEFAULT nextval('cliente_tributacao_co_tributacao_seq'::regclass);


SET search_path = pedido, pg_catalog;

--
-- Name: co_boleto; Type: DEFAULT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY boleto ALTER COLUMN co_boleto SET DEFAULT nextval('boleto_co_boleto_seq'::regclass);


--
-- Name: co_nota; Type: DEFAULT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY nota_fiscal ALTER COLUMN co_nota SET DEFAULT nextval('nota_fiscal_co_nota_seq'::regclass);


--
-- Name: co_pedido; Type: DEFAULT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY pedido ALTER COLUMN co_pedido SET DEFAULT nextval('pedido_co_pedido_seq'::regclass);


--
-- Name: co_status; Type: DEFAULT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY pedido_status ALTER COLUMN co_status SET DEFAULT nextval('pedido_status_co_status_seq'::regclass);


SET search_path = public, pg_catalog;

--
-- Name: co_email; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY email ALTER COLUMN co_email SET DEFAULT nextval('email_co_email_seq'::regclass);


--
-- Name: co_endereco; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY endereco ALTER COLUMN co_endereco SET DEFAULT nextval('endereco_co_endereco_seq'::regclass);


--
-- Name: co_moeda; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY moeda ALTER COLUMN co_moeda SET DEFAULT nextval('moeda_co_moeda_seq'::regclass);


--
-- Name: co_telefone; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY telefone ALTER COLUMN co_telefone SET DEFAULT nextval('telefone_co_telefone_seq'::regclass);


--
-- Name: co_usuario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuario ALTER COLUMN co_usuario SET DEFAULT nextval('usuario_co_usuario_seq1'::regclass);


SET search_path = representada, pg_catalog;

--
-- Name: co_imagem; Type: DEFAULT; Schema: representada; Owner: -
--

ALTER TABLE ONLY produto_imagem ALTER COLUMN co_imagem SET DEFAULT nextval('produto_imagem_co_imagem_seq'::regclass);


--
-- Name: co_produto; Type: DEFAULT; Schema: representada; Owner: -
--

ALTER TABLE ONLY produto_representada ALTER COLUMN co_produto SET DEFAULT nextval('produto_representada_co_produto_seq'::regclass);


SET search_path = transportadora, pg_catalog;

--
-- Name: co_transportadora; Type: DEFAULT; Schema: transportadora; Owner: -
--

ALTER TABLE ONLY transportadora ALTER COLUMN co_transportadora SET DEFAULT nextval('transportadora_co_transportadora_seq'::regclass);


SET search_path = cliente, pg_catalog;

--
-- Data for Name: cliente; Type: TABLE DATA; Schema: cliente; Owner: -
--

COPY cliente (co_cliente, ds_razao_social, ds_inscricao_estadual, st_suframa, ds_ramo_atividade, dt_cadastro, dt_fundacao, co_tributacao) FROM stdin;
23	 Animale	78.571.683	\N	Roupas	2013-05-24 19:26:01.776917	\N	1
\.


--
-- Data for Name: cliente_colaborador; Type: TABLE DATA; Schema: cliente; Owner: -
--

COPY cliente_colaborador (co_cliente, co_colaborador) FROM stdin;
\.


--
-- Data for Name: cliente_tributacao; Type: TABLE DATA; Schema: cliente; Owner: -
--

COPY cliente_tributacao (co_tributacao, no_tributacao) FROM stdin;
1	Simples
2	Nacional
3	Lucro Prezumido
4	Lucro Real
\.


SET search_path = colaboradores, pg_catalog;

--
-- Data for Name: colaborador; Type: TABLE DATA; Schema: colaboradores; Owner: -
--

COPY colaborador (co_colaborador, ds_email, tp_administrador, ds_telefone) FROM stdin;
1	hmello2007@hotmail.com	t	(21) 3333-9999
\.


SET search_path = pedido, pg_catalog;

--
-- Data for Name: boleto; Type: TABLE DATA; Schema: pedido; Owner: -
--

COPY boleto (co_boleto, nu_boleto, no_boleto, co_pedido) FROM stdin;
\.


--
-- Data for Name: nota_fiscal; Type: TABLE DATA; Schema: pedido; Owner: -
--

COPY nota_fiscal (co_nota, nu_nota_fiscal, no_file_nota_fiscal, co_pedido, co_tipo_nota) FROM stdin;
\.


--
-- Data for Name: pedido; Type: TABLE DATA; Schema: pedido; Owner: -
--

COPY pedido (co_representada, co_pedido, co_cliente, dt_pedido, co_pedido_cliente, co_status, dt_status, dt_emissao, co_colaborador, co_transportadora, ds_informacao) FROM stdin;
11	28	23	2013-08-14 12:50:57.257467	\N	1	2013-08-14 12:50:57.257467	\N	1	\N	\N
\.


--
-- Data for Name: pedido_status; Type: TABLE DATA; Schema: pedido; Owner: -
--

COPY pedido_status (co_status, no_status, st_status) FROM stdin;
1	Aberto	\N
2	Pendente de Produto	\N
3	Pendente de Entrega Parcial	\N
4	Pendente Cadasto Cliente	\N
5	Fechado	\N
6	Faturado	\N
7	Cancelado	\N
\.


--
-- Data for Name: produto_pedido; Type: TABLE DATA; Schema: pedido; Owner: -
--

COPY produto_pedido (co_pedido, qnt_original, qnt_entregue, dt_entrega_parcial, vl_original, vl_desconto, vl_comissao, co_produto, vl_ipi, dt_cadastro, tp_moeda, no_medida) FROM stdin;
28	10	5	\N	13.12		5	59	\N	2013-08-14 12:51:04.359916	1	Metro
\.


--
-- Data for Name: transportadora_pedido; Type: TABLE DATA; Schema: pedido; Owner: -
--

COPY transportadora_pedido (co_pedido, co_transportadora) FROM stdin;
\.


SET search_path = public, pg_catalog;

--
-- Data for Name: email; Type: TABLE DATA; Schema: public; Owner: -
--

COPY email (co_email, co_pessoa, tp_email, ds_email, dt_cadastro, dt_alteracao, no_email) FROM stdin;
5	23	1	narla@animale.com.br	2013-06-05 16:46:46.538099	\N	Narla
10	23	1	gisele.neves@animale.com.br	2013-06-09 19:40:44.683741	\N	Gisele
\.


--
-- Data for Name: empresa; Type: TABLE DATA; Schema: public; Owner: -
--

COPY empresa (co_empresa, no_empresa, no_dominio) FROM stdin;
1	HELENA	helena.fsitecnologia.com.br
2	FSI	fsitecnologia.com.br
\.


--
-- Data for Name: endereco; Type: TABLE DATA; Schema: public; Owner: -
--

COPY endereco (co_pessoa, no_endereco, ds_endereco, no_logradouro, nu_endereco, ds_complemento, co_municipio, no_municipio, ds_estado, co_pais, st_exterior, ds_ponto_referencia, ds_observacao, dt_cadastro, co_usuario_cadastro, dt_alteracao, co_usuario_alteracao, nu_latitude, nu_longitude, tp_endereco, no_bairro, nu_cep, co_estado, co_endereco) FROM stdin;
23	\N	\N	Rua São Cristóvão	786	\N	21	Rio de janeiro	\N	55	f	\N	\N	2013-06-04 18:46:53.949391	\N	\N	\N	-22.9009	-43.2166	2	São Cristovão	20940-000	RJ	4
\.


--
-- Data for Name: modulo; Type: TABLE DATA; Schema: public; Owner: -
--

COPY modulo (no_modulo, no_exibicao, ds_modulo, nu_ordem) FROM stdin;
\.


--
-- Data for Name: moeda; Type: TABLE DATA; Schema: public; Owner: -
--

COPY moeda (co_moeda, no_moeda) FROM stdin;
1	R$
2	US$
\.


--
-- Data for Name: perfil; Type: TABLE DATA; Schema: public; Owner: -
--

COPY perfil (co_perfil, no_perfil, ds_perfil, st_perfil) FROM stdin;
1	Administrador	Administrador	t
2	Colaborador	Colaborador	t
3	Gestor	Gestor	t
\.


--
-- Data for Name: permissao; Type: TABLE DATA; Schema: public; Owner: -
--

COPY permissao (co_perfil, dt_alteracao, co_usuario_alteracao, co_recurso, st_permissao, dt_cadastro, co_usuario_cadastro) FROM stdin;
\.


--
-- Data for Name: pessoa; Type: TABLE DATA; Schema: public; Owner: -
--

COPY pessoa (co_pessoa, no_pessoa, nu_cpf, nu_cnpj, co_empresa) FROM stdin;
1	Helena	\N	11111111111111	1
7	F2 Metalúrgica	\N	09.040.096/0001-96	1
11	Diamond Acessórios	\N	00.000.000/0000-00	1
23	Animale	\N	00.000.000/0000-00	1
\.


--
-- Data for Name: recurso; Type: TABLE DATA; Schema: public; Owner: -
--

COPY recurso (co_recurso, no_recurso, ds_recurso, tp_recurso, dt_cadastro, co_usuario_cadastro, dt_alteracao, co_usuario_alteracao) FROM stdin;
\.


--
-- Data for Name: telefone; Type: TABLE DATA; Schema: public; Owner: -
--

COPY telefone (co_telefone, co_pessoa, no_telefone, nu_ddi, nu_ddd, nu_telefone, tp_telefone, ds_telefone, dt_cadastro) FROM stdin;
2	23	Narla	55	21	2503-6850	1	\N	2013-06-04 19:02:56.357067
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY usuario (ds_password, dt_ultimo_login, ds_login, co_perfil, co_pessoa, co_usuario) FROM stdin;
123	2013-10-19 23:57:18	hmello2007@hotmail.com	1	1	1
\.


SET search_path = representada, pg_catalog;

--
-- Data for Name: produto_imagem; Type: TABLE DATA; Schema: representada; Owner: -
--

COPY produto_imagem (co_imagem, co_produto, no_imagem, dt_cadastro, co_ordem) FROM stdin;
\.


--
-- Data for Name: produto_representada; Type: TABLE DATA; Schema: representada; Owner: -
--

COPY produto_representada (co_produto, cod_produto, no_produto, co_representada, ds_valor, no_unidade, no_imagem, tp_moeda, ncm_sh) FROM stdin;
59	29	PLSS 29 BLACK DIAMOND/PÉR. NEGRA	11	13,12	Metro	1e69640da0eb46422e01e9487185024c.jpg	1	
63	PAZ-16986	PLACA VERTICAL CONVEPT	7	4,94	Unitário	7304f8c207368812e6edf1dcf60d0fb5.jpg	1	
1	YYY	PLACA HORIZONTAL CONVEPT	7	1,00	Unitário	\N	1	
64	9282	Pedra	11	1,00	Unidade	\N	1	
\.


--
-- Data for Name: representada; Type: TABLE DATA; Schema: representada; Owner: -
--

COPY representada (co_representada, ds_razao_social, dt_cadastro, nu_comissao, ds_info_adicionais) FROM stdin;
11	Diamond Acessórios	2013-05-19 19:34:50.842006	5	
7	F2 Metalúrgica	2013-05-19 18:39:23.58129	5	
\.


--
-- Data for Name: representada_colaborador; Type: TABLE DATA; Schema: representada; Owner: -
--

COPY representada_colaborador (co_representada, co_colaborador, nu_comissao) FROM stdin;
11	1	5
7	1	5
\.


SET search_path = transportadora, pg_catalog;

--
-- Data for Name: transportadora; Type: TABLE DATA; Schema: transportadora; Owner: -
--

COPY transportadora (co_transportadora, no_transportadora, no_site) FROM stdin;
1	JAMEFx	www.jamef.com.br
\.


SET search_path = cliente, pg_catalog;

--
-- Name: cliente_pkey; Type: CONSTRAINT; Schema: cliente; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (co_cliente);


--
-- Name: cliente_tributacao_pkey; Type: CONSTRAINT; Schema: cliente; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cliente_tributacao
    ADD CONSTRAINT cliente_tributacao_pkey PRIMARY KEY (co_tributacao);


--
-- Name: pkcliente_colaborador; Type: CONSTRAINT; Schema: cliente; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cliente_colaborador
    ADD CONSTRAINT pkcliente_colaborador PRIMARY KEY (co_cliente, co_colaborador);


SET search_path = colaboradores, pg_catalog;

--
-- Name: pkcolaborador; Type: CONSTRAINT; Schema: colaboradores; Owner: -; Tablespace: 
--

ALTER TABLE ONLY colaborador
    ADD CONSTRAINT pkcolaborador PRIMARY KEY (co_colaborador);


SET search_path = pedido, pg_catalog;

--
-- Name: boleto_pkey; Type: CONSTRAINT; Schema: pedido; Owner: -; Tablespace: 
--

ALTER TABLE ONLY boleto
    ADD CONSTRAINT boleto_pkey PRIMARY KEY (co_boleto);


--
-- Name: nota_fiscal_pkey; Type: CONSTRAINT; Schema: pedido; Owner: -; Tablespace: 
--

ALTER TABLE ONLY nota_fiscal
    ADD CONSTRAINT nota_fiscal_pkey PRIMARY KEY (co_nota);


--
-- Name: pedido_pkey; Type: CONSTRAINT; Schema: pedido; Owner: -; Tablespace: 
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT pedido_pkey PRIMARY KEY (co_pedido);


--
-- Name: pedido_status_pkey; Type: CONSTRAINT; Schema: pedido; Owner: -; Tablespace: 
--

ALTER TABLE ONLY pedido_status
    ADD CONSTRAINT pedido_status_pkey PRIMARY KEY (co_status);


--
-- Name: produto_pedido_pkey; Type: CONSTRAINT; Schema: pedido; Owner: -; Tablespace: 
--

ALTER TABLE ONLY produto_pedido
    ADD CONSTRAINT produto_pedido_pkey PRIMARY KEY (co_pedido, co_produto);


--
-- Name: transportadora_pedido_pkey; Type: CONSTRAINT; Schema: pedido; Owner: -; Tablespace: 
--

ALTER TABLE ONLY transportadora_pedido
    ADD CONSTRAINT transportadora_pedido_pkey PRIMARY KEY (co_pedido, co_transportadora);


SET search_path = public, pg_catalog;

--
-- Name: email_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY email
    ADD CONSTRAINT email_pkey PRIMARY KEY (co_email, co_pessoa);


--
-- Name: endereco_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY endereco
    ADD CONSTRAINT endereco_pkey PRIMARY KEY (co_endereco);


--
-- Name: modulo_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY modulo
    ADD CONSTRAINT modulo_pkey PRIMARY KEY (no_modulo);


--
-- Name: moeda_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY moeda
    ADD CONSTRAINT moeda_pkey PRIMARY KEY (co_moeda);


--
-- Name: perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_pkey PRIMARY KEY (co_perfil);


--
-- Name: permissao_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY permissao
    ADD CONSTRAINT permissao_pkey PRIMARY KEY (co_perfil, co_recurso);


--
-- Name: pkempresa; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY empresa
    ADD CONSTRAINT pkempresa PRIMARY KEY (co_empresa);


--
-- Name: pkpessoa; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY pessoa
    ADD CONSTRAINT pkpessoa PRIMARY KEY (co_pessoa);


--
-- Name: recurso_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY recurso
    ADD CONSTRAINT recurso_pkey PRIMARY KEY (co_recurso);


--
-- Name: telefone_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY telefone
    ADD CONSTRAINT telefone_pkey PRIMARY KEY (co_telefone, co_pessoa);


--
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (co_usuario);


SET search_path = representada, pg_catalog;

--
-- Name: pkrepresentada_colaborador; Type: CONSTRAINT; Schema: representada; Owner: -; Tablespace: 
--

ALTER TABLE ONLY representada_colaborador
    ADD CONSTRAINT pkrepresentada_colaborador PRIMARY KEY (co_representada, co_colaborador);


--
-- Name: produto_imagem_pkey; Type: CONSTRAINT; Schema: representada; Owner: -; Tablespace: 
--

ALTER TABLE ONLY produto_imagem
    ADD CONSTRAINT produto_imagem_pkey PRIMARY KEY (co_imagem, co_produto);


--
-- Name: produto_representada_pkey; Type: CONSTRAINT; Schema: representada; Owner: -; Tablespace: 
--

ALTER TABLE ONLY produto_representada
    ADD CONSTRAINT produto_representada_pkey PRIMARY KEY (co_produto);


--
-- Name: representada_pkey; Type: CONSTRAINT; Schema: representada; Owner: -; Tablespace: 
--

ALTER TABLE ONLY representada
    ADD CONSTRAINT representada_pkey PRIMARY KEY (co_representada);


SET search_path = transportadora, pg_catalog;

--
-- Name: transportadora_pkey; Type: CONSTRAINT; Schema: transportadora; Owner: -; Tablespace: 
--

ALTER TABLE ONLY transportadora
    ADD CONSTRAINT transportadora_pkey PRIMARY KEY (co_transportadora);


SET search_path = cliente, pg_catalog;

--
-- Name: cliente_co_tributacao_fkey; Type: FK CONSTRAINT; Schema: cliente; Owner: -
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_co_tributacao_fkey FOREIGN KEY (co_tributacao) REFERENCES cliente_tributacao(co_tributacao) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_cliente_colaborador_cliente; Type: FK CONSTRAINT; Schema: cliente; Owner: -
--

ALTER TABLE ONLY cliente_colaborador
    ADD CONSTRAINT fk_cliente_colaborador_cliente FOREIGN KEY (co_cliente) REFERENCES cliente(co_cliente);


--
-- Name: fk_cliente_colaborador_colaborador; Type: FK CONSTRAINT; Schema: cliente; Owner: -
--

ALTER TABLE ONLY cliente_colaborador
    ADD CONSTRAINT fk_cliente_colaborador_colaborador FOREIGN KEY (co_colaborador) REFERENCES colaboradores.colaborador(co_colaborador);


--
-- Name: fk_cliente_pessoa; Type: FK CONSTRAINT; Schema: cliente; Owner: -
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT fk_cliente_pessoa FOREIGN KEY (co_cliente) REFERENCES public.pessoa(co_pessoa);


SET search_path = colaboradores, pg_catalog;

--
-- Name: colaborador_co_colaborador_fkey; Type: FK CONSTRAINT; Schema: colaboradores; Owner: -
--

ALTER TABLE ONLY colaborador
    ADD CONSTRAINT colaborador_co_colaborador_fkey FOREIGN KEY (co_colaborador) REFERENCES public.pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE RESTRICT;


SET search_path = pedido, pg_catalog;

--
-- Name: nota_fiscal_co_pedido_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY nota_fiscal
    ADD CONSTRAINT nota_fiscal_co_pedido_fkey FOREIGN KEY (co_pedido) REFERENCES pedido(co_pedido) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: nota_fiscal_co_pedido_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY boleto
    ADD CONSTRAINT nota_fiscal_co_pedido_fkey FOREIGN KEY (co_pedido) REFERENCES pedido(co_pedido) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pedido_co_cliente_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT pedido_co_cliente_fkey FOREIGN KEY (co_cliente) REFERENCES cliente.cliente(co_cliente) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pedido_co_colaborador_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT pedido_co_colaborador_fkey FOREIGN KEY (co_colaborador) REFERENCES colaboradores.colaborador(co_colaborador) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: pedido_co_representada_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT pedido_co_representada_fkey FOREIGN KEY (co_representada) REFERENCES representada.representada(co_representada) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pedido_co_status_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT pedido_co_status_fkey FOREIGN KEY (co_status) REFERENCES pedido_status(co_status) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: pedido_co_transportadora_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT pedido_co_transportadora_fkey FOREIGN KEY (co_transportadora) REFERENCES transportadora.transportadora(co_transportadora) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: produto_pedido_co_pedido_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY produto_pedido
    ADD CONSTRAINT produto_pedido_co_pedido_fkey FOREIGN KEY (co_pedido) REFERENCES pedido(co_pedido) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: produto_pedido_co_produto_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY produto_pedido
    ADD CONSTRAINT produto_pedido_co_produto_fkey FOREIGN KEY (co_produto) REFERENCES representada.produto_representada(co_produto) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: produto_pedido_tp_moeda_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY produto_pedido
    ADD CONSTRAINT produto_pedido_tp_moeda_fkey FOREIGN KEY (tp_moeda) REFERENCES public.moeda(co_moeda) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: transportadora_pedido_co_pedido_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY transportadora_pedido
    ADD CONSTRAINT transportadora_pedido_co_pedido_fkey FOREIGN KEY (co_pedido) REFERENCES pedido(co_pedido) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: transportadora_pedido_co_transportadora_fkey; Type: FK CONSTRAINT; Schema: pedido; Owner: -
--

ALTER TABLE ONLY transportadora_pedido
    ADD CONSTRAINT transportadora_pedido_co_transportadora_fkey FOREIGN KEY (co_transportadora) REFERENCES transportadora.transportadora(co_transportadora) ON UPDATE CASCADE ON DELETE CASCADE;


SET search_path = public, pg_catalog;

--
-- Name: email_co_pessoa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY email
    ADD CONSTRAINT email_co_pessoa_fkey FOREIGN KEY (co_pessoa) REFERENCES pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: endereco_co_pessoa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY endereco
    ADD CONSTRAINT endereco_co_pessoa_fkey FOREIGN KEY (co_pessoa) REFERENCES pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_permissao_perfil; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY permissao
    ADD CONSTRAINT fk_permissao_perfil FOREIGN KEY (co_perfil) REFERENCES perfil(co_perfil) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: fk_permissao_recurso; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY permissao
    ADD CONSTRAINT fk_permissao_recurso FOREIGN KEY (co_recurso) REFERENCES recurso(co_recurso) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: pessoa_co_empresa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY pessoa
    ADD CONSTRAINT pessoa_co_empresa_fkey FOREIGN KEY (co_empresa) REFERENCES empresa(co_empresa) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: telefone_co_pessoa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY telefone
    ADD CONSTRAINT telefone_co_pessoa_fkey FOREIGN KEY (co_pessoa) REFERENCES pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: user_co_perfil_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT user_co_perfil_fkey FOREIGN KEY (co_perfil) REFERENCES perfil(co_perfil) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: usuario_co_pessoa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_co_pessoa_fkey FOREIGN KEY (co_pessoa) REFERENCES pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE RESTRICT;


SET search_path = representada, pg_catalog;

--
-- Name: fk_co_empresa_sistema; Type: FK CONSTRAINT; Schema: representada; Owner: -
--

ALTER TABLE ONLY representada_colaborador
    ADD CONSTRAINT fk_co_empresa_sistema FOREIGN KEY (co_colaborador) REFERENCES colaboradores.colaborador(co_colaborador);


--
-- Name: fk_representada_colaborador_representada; Type: FK CONSTRAINT; Schema: representada; Owner: -
--

ALTER TABLE ONLY representada_colaborador
    ADD CONSTRAINT fk_representada_colaborador_representada FOREIGN KEY (co_representada) REFERENCES representada(co_representada);


--
-- Name: produto_imagem_co_produto_fkey; Type: FK CONSTRAINT; Schema: representada; Owner: -
--

ALTER TABLE ONLY produto_imagem
    ADD CONSTRAINT produto_imagem_co_produto_fkey FOREIGN KEY (co_produto) REFERENCES produto_representada(co_produto);


--
-- Name: produto_representada_co_representada_fkey; Type: FK CONSTRAINT; Schema: representada; Owner: -
--

ALTER TABLE ONLY produto_representada
    ADD CONSTRAINT produto_representada_co_representada_fkey FOREIGN KEY (co_representada) REFERENCES representada(co_representada) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: produto_representada_tp_moeda_fkey; Type: FK CONSTRAINT; Schema: representada; Owner: -
--

ALTER TABLE ONLY produto_representada
    ADD CONSTRAINT produto_representada_tp_moeda_fkey FOREIGN KEY (tp_moeda) REFERENCES public.moeda(co_moeda) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: representada_co_representada_fkey; Type: FK CONSTRAINT; Schema: representada; Owner: -
--

ALTER TABLE ONLY representada
    ADD CONSTRAINT representada_co_representada_fkey FOREIGN KEY (co_representada) REFERENCES public.pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- PostgreSQL database dump complete
--

