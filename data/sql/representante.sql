--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: cliente; Type: SCHEMA; Schema: -; Owner: representante
--

CREATE SCHEMA cliente;


ALTER SCHEMA cliente OWNER TO representante;

--
-- Name: colaboradores; Type: SCHEMA; Schema: -; Owner: representante
--

CREATE SCHEMA colaboradores;


ALTER SCHEMA colaboradores OWNER TO representante;

--
-- Name: faturamento; Type: SCHEMA; Schema: -; Owner: representante
--

CREATE SCHEMA faturamento;


ALTER SCHEMA faturamento OWNER TO representante;

--
-- Name: pedido; Type: SCHEMA; Schema: -; Owner: representante
--

CREATE SCHEMA pedido;


ALTER SCHEMA pedido OWNER TO representante;

--
-- Name: representada; Type: SCHEMA; Schema: -; Owner: representante
--

CREATE SCHEMA representada;


ALTER SCHEMA representada OWNER TO representante;

--
-- Name: transportadora; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA transportadora;


ALTER SCHEMA transportadora OWNER TO postgres;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = cliente, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cliente; Type: TABLE; Schema: cliente; Owner: representante; Tablespace: 
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


ALTER TABLE cliente.cliente OWNER TO representante;

--
-- Name: cliente_co_cliente_seq; Type: SEQUENCE; Schema: cliente; Owner: representante
--

CREATE SEQUENCE cliente_co_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cliente.cliente_co_cliente_seq OWNER TO representante;

--
-- Name: cliente_colaborador; Type: TABLE; Schema: cliente; Owner: representante; Tablespace: 
--

CREATE TABLE cliente_colaborador (
    co_cliente integer NOT NULL,
    co_colaborador integer NOT NULL
);


ALTER TABLE cliente.cliente_colaborador OWNER TO representante;

--
-- Name: cliente_tributacao; Type: TABLE; Schema: cliente; Owner: postgres; Tablespace: 
--

CREATE TABLE cliente_tributacao (
    co_tributacao integer NOT NULL,
    no_tributacao character varying(200)
);


ALTER TABLE cliente.cliente_tributacao OWNER TO postgres;

--
-- Name: cliente_tributacao_co_tributacao_seq; Type: SEQUENCE; Schema: cliente; Owner: postgres
--

CREATE SEQUENCE cliente_tributacao_co_tributacao_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cliente.cliente_tributacao_co_tributacao_seq OWNER TO postgres;

--
-- Name: cliente_tributacao_co_tributacao_seq; Type: SEQUENCE OWNED BY; Schema: cliente; Owner: postgres
--

ALTER SEQUENCE cliente_tributacao_co_tributacao_seq OWNED BY cliente_tributacao.co_tributacao;


SET search_path = colaboradores, pg_catalog;

--
-- Name: colaborador; Type: TABLE; Schema: colaboradores; Owner: representante; Tablespace: 
--

CREATE TABLE colaborador (
    co_colaborador integer NOT NULL,
    ds_email character varying(250),
    tp_administrador boolean,
    ds_telefone character varying(33)
);


ALTER TABLE colaboradores.colaborador OWNER TO representante;

--
-- Name: colaborador_co_colaborador_seq; Type: SEQUENCE; Schema: colaboradores; Owner: representante
--

CREATE SEQUENCE colaborador_co_colaborador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE colaboradores.colaborador_co_colaborador_seq OWNER TO representante;

SET search_path = public, pg_catalog;

--
-- Name: email; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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


ALTER TABLE public.email OWNER TO postgres;

--
-- Name: email_co_email_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE email_co_email_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.email_co_email_seq OWNER TO postgres;

--
-- Name: email_co_email_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE email_co_email_seq OWNED BY email.co_email;


--
-- Name: sistema_co_sistema_seq; Type: SEQUENCE; Schema: public; Owner: representante
--

CREATE SEQUENCE sistema_co_sistema_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sistema_co_sistema_seq OWNER TO representante;

--
-- Name: empresa; Type: TABLE; Schema: public; Owner: representante; Tablespace: 
--

CREATE TABLE empresa (
    co_empresa integer DEFAULT nextval('sistema_co_sistema_seq'::regclass) NOT NULL,
    no_empresa character varying(200),
    no_dominio character varying(200)
);


ALTER TABLE public.empresa OWNER TO representante;

--
-- Name: endereco; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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


ALTER TABLE public.endereco OWNER TO postgres;

--
-- Name: endereco_co_endereco_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE endereco_co_endereco_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.endereco_co_endereco_seq OWNER TO postgres;

--
-- Name: endereco_co_endereco_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE endereco_co_endereco_seq OWNED BY endereco.co_endereco;


--
-- Name: modulo; Type: TABLE; Schema: public; Owner: representante; Tablespace: 
--

CREATE TABLE modulo (
    no_modulo character varying(50) NOT NULL,
    no_exibicao character varying(100) NOT NULL,
    ds_modulo text,
    nu_ordem integer DEFAULT 0
);


ALTER TABLE public.modulo OWNER TO representante;

--
-- Name: moeda; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE moeda (
    co_moeda integer NOT NULL,
    no_moeda character varying(30)
);


ALTER TABLE public.moeda OWNER TO postgres;

--
-- Name: moeda_co_moeda_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE moeda_co_moeda_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.moeda_co_moeda_seq OWNER TO postgres;

--
-- Name: moeda_co_moeda_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE moeda_co_moeda_seq OWNED BY moeda.co_moeda;


--
-- Name: perfil_co_perfil_seq; Type: SEQUENCE; Schema: public; Owner: representante
--

CREATE SEQUENCE perfil_co_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perfil_co_perfil_seq OWNER TO representante;

--
-- Name: perfil; Type: TABLE; Schema: public; Owner: representante; Tablespace: 
--

CREATE TABLE perfil (
    co_perfil integer DEFAULT nextval('perfil_co_perfil_seq'::regclass) NOT NULL,
    no_perfil character varying(150),
    ds_perfil text,
    st_perfil boolean DEFAULT true NOT NULL
);


ALTER TABLE public.perfil OWNER TO representante;

--
-- Name: permissao; Type: TABLE; Schema: public; Owner: representante; Tablespace: 
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


ALTER TABLE public.permissao OWNER TO representante;

--
-- Name: pessoa_co_pessoa_seq; Type: SEQUENCE; Schema: public; Owner: representante
--

CREATE SEQUENCE pessoa_co_pessoa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pessoa_co_pessoa_seq OWNER TO representante;

--
-- Name: pessoa; Type: TABLE; Schema: public; Owner: representante; Tablespace: 
--

CREATE TABLE pessoa (
    co_pessoa integer DEFAULT nextval('pessoa_co_pessoa_seq'::regclass) NOT NULL,
    no_pessoa character varying(200) NOT NULL,
    nu_cpf character varying(25),
    nu_cnpj character varying(25),
    co_empresa integer
);


ALTER TABLE public.pessoa OWNER TO representante;

--
-- Name: recurso_co_recurso_seq; Type: SEQUENCE; Schema: public; Owner: representante
--

CREATE SEQUENCE recurso_co_recurso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recurso_co_recurso_seq OWNER TO representante;

--
-- Name: recurso; Type: TABLE; Schema: public; Owner: representante; Tablespace: 
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


ALTER TABLE public.recurso OWNER TO representante;

--
-- Name: telefone; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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


ALTER TABLE public.telefone OWNER TO postgres;

--
-- Name: telefone_co_telefone_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE telefone_co_telefone_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.telefone_co_telefone_seq OWNER TO postgres;

--
-- Name: telefone_co_telefone_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE telefone_co_telefone_seq OWNED BY telefone.co_telefone;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: representante; Tablespace: 
--

CREATE TABLE usuario (
    ds_password character varying(200),
    dt_ultimo_login timestamp without time zone,
    ds_login character varying(120),
    co_perfil integer,
    co_pessoa integer NOT NULL,
    co_usuario integer NOT NULL
);


ALTER TABLE public.usuario OWNER TO representante;

--
-- Name: usuario_co_usuario_seq; Type: SEQUENCE; Schema: public; Owner: representante
--

CREATE SEQUENCE usuario_co_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_co_usuario_seq OWNER TO representante;

--
-- Name: usuario_co_usuario_seq1; Type: SEQUENCE; Schema: public; Owner: representante
--

CREATE SEQUENCE usuario_co_usuario_seq1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_co_usuario_seq1 OWNER TO representante;

--
-- Name: usuario_co_usuario_seq1; Type: SEQUENCE OWNED BY; Schema: public; Owner: representante
--

ALTER SEQUENCE usuario_co_usuario_seq1 OWNED BY usuario.co_usuario;


SET search_path = representada, pg_catalog;

--
-- Name: produto_imagem; Type: TABLE; Schema: representada; Owner: representante; Tablespace: 
--

CREATE TABLE produto_imagem (
    co_imagem integer NOT NULL,
    co_produto integer NOT NULL,
    no_imagem character varying(200),
    dt_cadastro timestamp without time zone DEFAULT now(),
    co_ordem integer
);


ALTER TABLE representada.produto_imagem OWNER TO representante;

--
-- Name: produto_imagem_co_imagem_seq; Type: SEQUENCE; Schema: representada; Owner: representante
--

CREATE SEQUENCE produto_imagem_co_imagem_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE representada.produto_imagem_co_imagem_seq OWNER TO representante;

--
-- Name: produto_imagem_co_imagem_seq; Type: SEQUENCE OWNED BY; Schema: representada; Owner: representante
--

ALTER SEQUENCE produto_imagem_co_imagem_seq OWNED BY produto_imagem.co_imagem;


--
-- Name: produto_representada; Type: TABLE; Schema: representada; Owner: representante; Tablespace: 
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


ALTER TABLE representada.produto_representada OWNER TO representante;

--
-- Name: produto_representada_co_produto_seq; Type: SEQUENCE; Schema: representada; Owner: representante
--

CREATE SEQUENCE produto_representada_co_produto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE representada.produto_representada_co_produto_seq OWNER TO representante;

--
-- Name: produto_representada_co_produto_seq; Type: SEQUENCE OWNED BY; Schema: representada; Owner: representante
--

ALTER SEQUENCE produto_representada_co_produto_seq OWNED BY produto_representada.co_produto;


--
-- Name: representada; Type: TABLE; Schema: representada; Owner: representante; Tablespace: 
--

CREATE TABLE representada (
    co_representada integer NOT NULL,
    ds_razao_social character varying(255),
    dt_cadastro timestamp without time zone DEFAULT now(),
    nu_comissao character varying(255),
    ds_info_adicionais text
);


ALTER TABLE representada.representada OWNER TO representante;

--
-- Name: representada_co_representada_seq; Type: SEQUENCE; Schema: representada; Owner: representante
--

CREATE SEQUENCE representada_co_representada_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE representada.representada_co_representada_seq OWNER TO representante;

--
-- Name: representada_colaborador; Type: TABLE; Schema: representada; Owner: representante; Tablespace: 
--

CREATE TABLE representada_colaborador (
    co_representada integer NOT NULL,
    co_colaborador integer NOT NULL,
    nu_comissao character varying(3) NOT NULL
);


ALTER TABLE representada.representada_colaborador OWNER TO representante;

SET search_path = transportadora, pg_catalog;

--
-- Name: transportadora; Type: TABLE; Schema: transportadora; Owner: representante; Tablespace: 
--

CREATE TABLE transportadora (
    co_transportadora integer NOT NULL,
    no_transportadora character varying(200),
    no_site character varying(200)
);


ALTER TABLE transportadora.transportadora OWNER TO representante;

--
-- Name: transportadora_co_transportadora_seq; Type: SEQUENCE; Schema: transportadora; Owner: representante
--

CREATE SEQUENCE transportadora_co_transportadora_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE transportadora.transportadora_co_transportadora_seq OWNER TO representante;

--
-- Name: transportadora_co_transportadora_seq; Type: SEQUENCE OWNED BY; Schema: transportadora; Owner: representante
--

ALTER SEQUENCE transportadora_co_transportadora_seq OWNED BY transportadora.co_transportadora;


SET search_path = cliente, pg_catalog;

--
-- Name: co_tributacao; Type: DEFAULT; Schema: cliente; Owner: postgres
--

ALTER TABLE ONLY cliente_tributacao ALTER COLUMN co_tributacao SET DEFAULT nextval('cliente_tributacao_co_tributacao_seq'::regclass);


SET search_path = public, pg_catalog;

--
-- Name: co_email; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY email ALTER COLUMN co_email SET DEFAULT nextval('email_co_email_seq'::regclass);


--
-- Name: co_endereco; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY endereco ALTER COLUMN co_endereco SET DEFAULT nextval('endereco_co_endereco_seq'::regclass);


--
-- Name: co_moeda; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY moeda ALTER COLUMN co_moeda SET DEFAULT nextval('moeda_co_moeda_seq'::regclass);


--
-- Name: co_telefone; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY telefone ALTER COLUMN co_telefone SET DEFAULT nextval('telefone_co_telefone_seq'::regclass);


--
-- Name: co_usuario; Type: DEFAULT; Schema: public; Owner: representante
--

ALTER TABLE ONLY usuario ALTER COLUMN co_usuario SET DEFAULT nextval('usuario_co_usuario_seq1'::regclass);


SET search_path = representada, pg_catalog;

--
-- Name: co_imagem; Type: DEFAULT; Schema: representada; Owner: representante
--

ALTER TABLE ONLY produto_imagem ALTER COLUMN co_imagem SET DEFAULT nextval('produto_imagem_co_imagem_seq'::regclass);


--
-- Name: co_produto; Type: DEFAULT; Schema: representada; Owner: representante
--

ALTER TABLE ONLY produto_representada ALTER COLUMN co_produto SET DEFAULT nextval('produto_representada_co_produto_seq'::regclass);


SET search_path = transportadora, pg_catalog;

--
-- Name: co_transportadora; Type: DEFAULT; Schema: transportadora; Owner: representante
--

ALTER TABLE ONLY transportadora ALTER COLUMN co_transportadora SET DEFAULT nextval('transportadora_co_transportadora_seq'::regclass);


SET search_path = cliente, pg_catalog;

--
-- Data for Name: cliente; Type: TABLE DATA; Schema: cliente; Owner: representante
--

INSERT INTO cliente VALUES (23, '     FSI TEcnologia', '333333333333', NULL, 'TI', '2013-05-24 19:26:01.776917', NULL, 1);


--
-- Name: cliente_co_cliente_seq; Type: SEQUENCE SET; Schema: cliente; Owner: representante
--

SELECT pg_catalog.setval('cliente_co_cliente_seq', 1, false);


--
-- Data for Name: cliente_colaborador; Type: TABLE DATA; Schema: cliente; Owner: representante
--



--
-- Data for Name: cliente_tributacao; Type: TABLE DATA; Schema: cliente; Owner: postgres
--

INSERT INTO cliente_tributacao VALUES (1, 'Simples');
INSERT INTO cliente_tributacao VALUES (2, 'Nacional');
INSERT INTO cliente_tributacao VALUES (3, 'Lucro Prezumido');
INSERT INTO cliente_tributacao VALUES (4, 'Lucro Real');


--
-- Name: cliente_tributacao_co_tributacao_seq; Type: SEQUENCE SET; Schema: cliente; Owner: postgres
--

SELECT pg_catalog.setval('cliente_tributacao_co_tributacao_seq', 4, true);


SET search_path = colaboradores, pg_catalog;

--
-- Data for Name: colaborador; Type: TABLE DATA; Schema: colaboradores; Owner: representante
--

INSERT INTO colaborador VALUES (22, 'silva@vsilva.com', NULL, '(21) 9222-0009');
INSERT INTO colaborador VALUES (1, 'helena@helena.com.br', true, '(21) 3333-9999');


--
-- Name: colaborador_co_colaborador_seq; Type: SEQUENCE SET; Schema: colaboradores; Owner: representante
--

SELECT pg_catalog.setval('colaborador_co_colaborador_seq', 4, true);


SET search_path = public, pg_catalog;

--
-- Data for Name: email; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO email VALUES (5, 23, '1', 'fabio@fsitecnologia.com.br', '2013-06-05 16:46:46.538099', NULL, 'Fabio Rocha.');


--
-- Name: email_co_email_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('email_co_email_seq', 9, true);


--
-- Data for Name: empresa; Type: TABLE DATA; Schema: public; Owner: representante
--

INSERT INTO empresa VALUES (1, 'HELENA', 'helena.fsitecnologia.com.br');
INSERT INTO empresa VALUES (2, 'FSI', 'fsitecnologia.com.br');


--
-- Data for Name: endereco; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO endereco VALUES (23, NULL, NULL, 'Vila Guimarães', '9', NULL, 21, 'Rio de janeiro', NULL, 55, false, NULL, NULL, '2013-06-04 18:46:53.949391', NULL, NULL, NULL, '-22.80668', '-43.35493', 2, 'Pavuna', '21721-560', 'RJ', 4);
INSERT INTO endereco VALUES (23, 'Principal', NULL, 'Rua dos Floricultores', '6', NULL, 21, ' Rio de Janeiro', 'Rio de Janeiro', 55, false, NULL, NULL, '2013-06-04 18:46:38.513623', NULL, NULL, NULL, ' -22.96842', ' -43.64109', 1, 'Guaratiba', '23032-270', 'RJ', 2);
INSERT INTO endereco VALUES (23, NULL, NULL, 'Estrada do Rosário', '1085', NULL, NULL, 'Duque de Caxias', NULL, NULL, false, NULL, NULL, '2013-06-06 20:48:03.036359', NULL, NULL, NULL, '-22.6771', '-43.2762', 1, 'Jardim Primavera', '11111-111', 'RJ', 12);


--
-- Name: endereco_co_endereco_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('endereco_co_endereco_seq', 12, true);


--
-- Data for Name: modulo; Type: TABLE DATA; Schema: public; Owner: representante
--



--
-- Data for Name: moeda; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO moeda VALUES (1, 'R$');
INSERT INTO moeda VALUES (2, 'US$');


--
-- Name: moeda_co_moeda_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('moeda_co_moeda_seq', 1, false);


--
-- Data for Name: perfil; Type: TABLE DATA; Schema: public; Owner: representante
--

INSERT INTO perfil VALUES (1, 'Administrador', 'Administrador', true);
INSERT INTO perfil VALUES (2, 'Colaborador', 'Colaborador', true);
INSERT INTO perfil VALUES (3, 'Gestor', 'Gestor', true);


--
-- Name: perfil_co_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: representante
--

SELECT pg_catalog.setval('perfil_co_perfil_seq', 1, false);


--
-- Data for Name: permissao; Type: TABLE DATA; Schema: public; Owner: representante
--



--
-- Data for Name: pessoa; Type: TABLE DATA; Schema: public; Owner: representante
--

INSERT INTO pessoa VALUES (1, 'Helena', NULL, '11111111111111', 1);
INSERT INTO pessoa VALUES (11, 'Intel Processadores', NULL, '12.233.444/4444-44', 1);
INSERT INTO pessoa VALUES (10, 'Samsung Monitores', NULL, '99.999.999/9999-99', 1);
INSERT INTO pessoa VALUES (7, 'DLINK SA LTDA', NULL, '22.222.222/2222-22', 1);
INSERT INTO pessoa VALUES (23, 'FSI TEcnologia', NULL, '22.222.222/2222-22', 1);
INSERT INTO pessoa VALUES (22, 'Silva', NULL, NULL, 1);


--
-- Name: pessoa_co_pessoa_seq; Type: SEQUENCE SET; Schema: public; Owner: representante
--

SELECT pg_catalog.setval('pessoa_co_pessoa_seq', 43, true);


--
-- Data for Name: recurso; Type: TABLE DATA; Schema: public; Owner: representante
--



--
-- Name: recurso_co_recurso_seq; Type: SEQUENCE SET; Schema: public; Owner: representante
--

SELECT pg_catalog.setval('recurso_co_recurso_seq', 1, false);


--
-- Name: sistema_co_sistema_seq; Type: SEQUENCE SET; Schema: public; Owner: representante
--

SELECT pg_catalog.setval('sistema_co_sistema_seq', 1, false);


--
-- Data for Name: telefone; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO telefone VALUES (2, 23, 'Fulano', '55', '21', '3313-2353', 1, NULL, '2013-06-04 19:02:56.357067');
INSERT INTO telefone VALUES (3, 23, 'Fabio Rocha', '55', '22', '3313-2222', 1, NULL, '2013-06-04 19:03:11.648873');


--
-- Name: telefone_co_telefone_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('telefone_co_telefone_seq', 7, true);


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: representante
--

INSERT INTO usuario VALUES ('qwe', NULL, 'silva@vsilva.com', 2, 22, 8);
INSERT INTO usuario VALUES ('123', '2013-06-06 20:36:30', 'helena@helena.com.br', 1, 1, 1);


--
-- Name: usuario_co_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: representante
--

SELECT pg_catalog.setval('usuario_co_usuario_seq', 10, true);


--
-- Name: usuario_co_usuario_seq1; Type: SEQUENCE SET; Schema: public; Owner: representante
--

SELECT pg_catalog.setval('usuario_co_usuario_seq1', 2, true);


SET search_path = representada, pg_catalog;

--
-- Data for Name: produto_imagem; Type: TABLE DATA; Schema: representada; Owner: representante
--



--
-- Name: produto_imagem_co_imagem_seq; Type: SEQUENCE SET; Schema: representada; Owner: representante
--

SELECT pg_catalog.setval('produto_imagem_co_imagem_seq', 1, false);


--
-- Data for Name: produto_representada; Type: TABLE DATA; Schema: representada; Owner: representante
--

INSERT INTO produto_representada VALUES (59, '', 'Core i7', 11, '895,00', NULL, '1e69640da0eb46422e01e9487185024c.jpg', 1, NULL);
INSERT INTO produto_representada VALUES (60, '', 'Core i3', 11, '355,00', NULL, 'fa9e7d9d075868256ba7ccb9913999a5.jpg', 1, NULL);
INSERT INTO produto_representada VALUES (62, '', 'LCD', 10, '1.000,00', NULL, 'e96000417bf04daa19b27e5fc192f42f.jpg', 1, NULL);
INSERT INTO produto_representada VALUES (63, '4444', 'Ata Linksys', 7, '333,33', 'Metro', '7304f8c207368812e6edf1dcf60d0fb5.jpg', 1, '123');
INSERT INTO produto_representada VALUES (58, '543534', 'gggggg', 7, '122,22', 'Unitário', NULL, 2, '555');
INSERT INTO produto_representada VALUES (61, '', 'Led', 10, '2.000,00', '', '0f03559f64a63c07ced812e127802d2e.jpg', 2, '');


--
-- Name: produto_representada_co_produto_seq; Type: SEQUENCE SET; Schema: representada; Owner: representante
--

SELECT pg_catalog.setval('produto_representada_co_produto_seq', 63, true);


--
-- Data for Name: representada; Type: TABLE DATA; Schema: representada; Owner: representante
--

INSERT INTO representada VALUES (11, 'Intel Processadores', '2013-05-19 19:34:50.842006', '44', '');
INSERT INTO representada VALUES (10, 'Samsung Monitores', '2013-05-19 19:34:41.397477', '33', '');
INSERT INTO representada VALUES (7, 'DLINK SA', '2013-05-19 18:39:23.58129', '13', '');


--
-- Name: representada_co_representada_seq; Type: SEQUENCE SET; Schema: representada; Owner: representante
--

SELECT pg_catalog.setval('representada_co_representada_seq', 3, true);


--
-- Data for Name: representada_colaborador; Type: TABLE DATA; Schema: representada; Owner: representante
--

INSERT INTO representada_colaborador VALUES (7, 1, '5');
INSERT INTO representada_colaborador VALUES (11, 1, '5');


SET search_path = transportadora, pg_catalog;

--
-- Data for Name: transportadora; Type: TABLE DATA; Schema: transportadora; Owner: representante
--

INSERT INTO transportadora VALUES (1, 'JAMEFx', 'www.jamef.com.br');


--
-- Name: transportadora_co_transportadora_seq; Type: SEQUENCE SET; Schema: transportadora; Owner: representante
--

SELECT pg_catalog.setval('transportadora_co_transportadora_seq', 3, true);


SET search_path = cliente, pg_catalog;

--
-- Name: cliente_pkey; Type: CONSTRAINT; Schema: cliente; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (co_cliente);


--
-- Name: cliente_tributacao_pkey; Type: CONSTRAINT; Schema: cliente; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cliente_tributacao
    ADD CONSTRAINT cliente_tributacao_pkey PRIMARY KEY (co_tributacao);


--
-- Name: pkcliente_colaborador; Type: CONSTRAINT; Schema: cliente; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY cliente_colaborador
    ADD CONSTRAINT pkcliente_colaborador PRIMARY KEY (co_cliente, co_colaborador);


SET search_path = colaboradores, pg_catalog;

--
-- Name: pkcolaborador; Type: CONSTRAINT; Schema: colaboradores; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY colaborador
    ADD CONSTRAINT pkcolaborador PRIMARY KEY (co_colaborador);


SET search_path = public, pg_catalog;

--
-- Name: email_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY email
    ADD CONSTRAINT email_pkey PRIMARY KEY (co_email, co_pessoa);


--
-- Name: endereco_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY endereco
    ADD CONSTRAINT endereco_pkey PRIMARY KEY (co_endereco);


--
-- Name: modulo_pkey; Type: CONSTRAINT; Schema: public; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY modulo
    ADD CONSTRAINT modulo_pkey PRIMARY KEY (no_modulo);


--
-- Name: moeda_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY moeda
    ADD CONSTRAINT moeda_pkey PRIMARY KEY (co_moeda);


--
-- Name: perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_pkey PRIMARY KEY (co_perfil);


--
-- Name: permissao_pkey; Type: CONSTRAINT; Schema: public; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY permissao
    ADD CONSTRAINT permissao_pkey PRIMARY KEY (co_perfil, co_recurso);


--
-- Name: pkempresa; Type: CONSTRAINT; Schema: public; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY empresa
    ADD CONSTRAINT pkempresa PRIMARY KEY (co_empresa);


--
-- Name: pkpessoa; Type: CONSTRAINT; Schema: public; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY pessoa
    ADD CONSTRAINT pkpessoa PRIMARY KEY (co_pessoa);


--
-- Name: recurso_pkey; Type: CONSTRAINT; Schema: public; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY recurso
    ADD CONSTRAINT recurso_pkey PRIMARY KEY (co_recurso);


--
-- Name: telefone_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY telefone
    ADD CONSTRAINT telefone_pkey PRIMARY KEY (co_telefone, co_pessoa);


--
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (co_usuario);


SET search_path = representada, pg_catalog;

--
-- Name: pkrepresentada_colaborador; Type: CONSTRAINT; Schema: representada; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY representada_colaborador
    ADD CONSTRAINT pkrepresentada_colaborador PRIMARY KEY (co_representada, co_colaborador);


--
-- Name: produto_imagem_pkey; Type: CONSTRAINT; Schema: representada; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY produto_imagem
    ADD CONSTRAINT produto_imagem_pkey PRIMARY KEY (co_imagem, co_produto);


--
-- Name: produto_representada_pkey; Type: CONSTRAINT; Schema: representada; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY produto_representada
    ADD CONSTRAINT produto_representada_pkey PRIMARY KEY (co_produto);


--
-- Name: representada_pkey; Type: CONSTRAINT; Schema: representada; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY representada
    ADD CONSTRAINT representada_pkey PRIMARY KEY (co_representada);


SET search_path = transportadora, pg_catalog;

--
-- Name: transportadora_pkey; Type: CONSTRAINT; Schema: transportadora; Owner: representante; Tablespace: 
--

ALTER TABLE ONLY transportadora
    ADD CONSTRAINT transportadora_pkey PRIMARY KEY (co_transportadora);


SET search_path = cliente, pg_catalog;

--
-- Name: cliente_co_tributacao_fkey; Type: FK CONSTRAINT; Schema: cliente; Owner: representante
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_co_tributacao_fkey FOREIGN KEY (co_tributacao) REFERENCES cliente_tributacao(co_tributacao) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_cliente_colaborador_cliente; Type: FK CONSTRAINT; Schema: cliente; Owner: representante
--

ALTER TABLE ONLY cliente_colaborador
    ADD CONSTRAINT fk_cliente_colaborador_cliente FOREIGN KEY (co_cliente) REFERENCES cliente(co_cliente);


--
-- Name: fk_cliente_colaborador_colaborador; Type: FK CONSTRAINT; Schema: cliente; Owner: representante
--

ALTER TABLE ONLY cliente_colaborador
    ADD CONSTRAINT fk_cliente_colaborador_colaborador FOREIGN KEY (co_colaborador) REFERENCES colaboradores.colaborador(co_colaborador);


--
-- Name: fk_cliente_pessoa; Type: FK CONSTRAINT; Schema: cliente; Owner: representante
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT fk_cliente_pessoa FOREIGN KEY (co_cliente) REFERENCES public.pessoa(co_pessoa);


SET search_path = colaboradores, pg_catalog;

--
-- Name: colaborador_co_colaborador_fkey; Type: FK CONSTRAINT; Schema: colaboradores; Owner: representante
--

ALTER TABLE ONLY colaborador
    ADD CONSTRAINT colaborador_co_colaborador_fkey FOREIGN KEY (co_colaborador) REFERENCES public.pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE RESTRICT;


SET search_path = public, pg_catalog;

--
-- Name: email_co_pessoa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY email
    ADD CONSTRAINT email_co_pessoa_fkey FOREIGN KEY (co_pessoa) REFERENCES pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: endereco_co_pessoa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY endereco
    ADD CONSTRAINT endereco_co_pessoa_fkey FOREIGN KEY (co_pessoa) REFERENCES pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_permissao_perfil; Type: FK CONSTRAINT; Schema: public; Owner: representante
--

ALTER TABLE ONLY permissao
    ADD CONSTRAINT fk_permissao_perfil FOREIGN KEY (co_perfil) REFERENCES perfil(co_perfil) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: fk_permissao_recurso; Type: FK CONSTRAINT; Schema: public; Owner: representante
--

ALTER TABLE ONLY permissao
    ADD CONSTRAINT fk_permissao_recurso FOREIGN KEY (co_recurso) REFERENCES recurso(co_recurso) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: pessoa_co_empresa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: representante
--

ALTER TABLE ONLY pessoa
    ADD CONSTRAINT pessoa_co_empresa_fkey FOREIGN KEY (co_empresa) REFERENCES empresa(co_empresa) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: telefone_co_pessoa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY telefone
    ADD CONSTRAINT telefone_co_pessoa_fkey FOREIGN KEY (co_pessoa) REFERENCES pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: user_co_perfil_fkey; Type: FK CONSTRAINT; Schema: public; Owner: representante
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT user_co_perfil_fkey FOREIGN KEY (co_perfil) REFERENCES perfil(co_perfil) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: usuario_co_pessoa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: representante
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_co_pessoa_fkey FOREIGN KEY (co_pessoa) REFERENCES pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE RESTRICT;


SET search_path = representada, pg_catalog;

--
-- Name: fk_co_empresa_sistema; Type: FK CONSTRAINT; Schema: representada; Owner: representante
--

ALTER TABLE ONLY representada_colaborador
    ADD CONSTRAINT fk_co_empresa_sistema FOREIGN KEY (co_colaborador) REFERENCES colaboradores.colaborador(co_colaborador);


--
-- Name: fk_representada_colaborador_representada; Type: FK CONSTRAINT; Schema: representada; Owner: representante
--

ALTER TABLE ONLY representada_colaborador
    ADD CONSTRAINT fk_representada_colaborador_representada FOREIGN KEY (co_representada) REFERENCES representada(co_representada);


--
-- Name: produto_imagem_co_produto_fkey; Type: FK CONSTRAINT; Schema: representada; Owner: representante
--

ALTER TABLE ONLY produto_imagem
    ADD CONSTRAINT produto_imagem_co_produto_fkey FOREIGN KEY (co_produto) REFERENCES produto_representada(co_produto);


--
-- Name: produto_representada_co_representada_fkey; Type: FK CONSTRAINT; Schema: representada; Owner: representante
--

ALTER TABLE ONLY produto_representada
    ADD CONSTRAINT produto_representada_co_representada_fkey FOREIGN KEY (co_representada) REFERENCES representada(co_representada) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: produto_representada_tp_moeda_fkey; Type: FK CONSTRAINT; Schema: representada; Owner: representante
--

ALTER TABLE ONLY produto_representada
    ADD CONSTRAINT produto_representada_tp_moeda_fkey FOREIGN KEY (tp_moeda) REFERENCES public.moeda(co_moeda) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: representada_co_representada_fkey; Type: FK CONSTRAINT; Schema: representada; Owner: representante
--

ALTER TABLE ONLY representada
    ADD CONSTRAINT representada_co_representada_fkey FOREIGN KEY (co_representada) REFERENCES public.pessoa(co_pessoa) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

