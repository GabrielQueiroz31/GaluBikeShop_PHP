--
-- PostgreSQL database dump
--

\restrict fgebxpJCoxFqaXSoZJpR6Ss7e7KVx7IIfDSIv4H6KaXgGeOAwmjKSr2JdhtH6Sk

-- Dumped from database version 18.4
-- Dumped by pg_dump version 18.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: administradores; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.administradores (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    senha character varying(255) NOT NULL
);


ALTER TABLE public.administradores OWNER TO postgres;

--
-- Name: administradores_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.administradores_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.administradores_id_seq OWNER TO postgres;

--
-- Name: administradores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.administradores_id_seq OWNED BY public.administradores.id;


--
-- Name: clientes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.clientes (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    telefone character varying(20),
    senha character varying(255) NOT NULL
);


ALTER TABLE public.clientes OWNER TO postgres;

--
-- Name: clientes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.clientes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.clientes_id_seq OWNER TO postgres;

--
-- Name: clientes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.clientes_id_seq OWNED BY public.clientes.id;


--
-- Name: produtos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produtos (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    categoria character varying(100) NOT NULL,
    preco numeric(10,2) NOT NULL,
    quantidade integer NOT NULL,
    imagem character varying(255)
);


ALTER TABLE public.produtos OWNER TO postgres;

--
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produtos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.produtos_id_seq OWNER TO postgres;

--
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produtos_id_seq OWNED BY public.produtos.id;


--
-- Name: vendas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.vendas (
    id integer NOT NULL,
    cliente_id integer NOT NULL,
    produto_id integer NOT NULL,
    quantidade integer NOT NULL,
    valor_total numeric(10,2) NOT NULL,
    data_venda timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    forma_pagamento character varying(50)
);


ALTER TABLE public.vendas OWNER TO postgres;

--
-- Name: vendas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vendas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.vendas_id_seq OWNER TO postgres;

--
-- Name: vendas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vendas_id_seq OWNED BY public.vendas.id;


--
-- Name: administradores id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.administradores ALTER COLUMN id SET DEFAULT nextval('public.administradores_id_seq'::regclass);


--
-- Name: clientes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clientes ALTER COLUMN id SET DEFAULT nextval('public.clientes_id_seq'::regclass);


--
-- Name: produtos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos ALTER COLUMN id SET DEFAULT nextval('public.produtos_id_seq'::regclass);


--
-- Name: vendas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas ALTER COLUMN id SET DEFAULT nextval('public.vendas_id_seq'::regclass);


--
-- Data for Name: administradores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.administradores (id, nome, email, senha) FROM stdin;
1	Gomes	gomes@gmail.com	321
3	Luisa	luisa@gmail.com	123
\.


--
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.clientes (id, nome, email, telefone, senha) FROM stdin;
2	Ana Souza	ana@email.com	19888888889	123456
4	Gabriel	gabriel@gmail.com	19 991234567	$2y$12$jS9npvrA8YmMBmmGAU6gEOuCKkU/CN9rt6aEeiSd98QDDYE.t5ire
5	enzo	enzo@gmail.com	19 996335298	$2y$12$9mcJatvuQbF6YqNXGgJdd.9WpzHBbZvr1YMOjoga4mq1z6a3BD0/u
12	bosso	bosso@gmail.com	19 996335211	$2y$12$8c5nlcZ6CFhq1Eclk0YMd..TF5IsJfrow4teDIxflww47Rrm.WRWi
1	João Silva	joaao@email.com	19999999988	123456
14	igor	igor@gmail.com	18981236767	$2y$12$2dwP/gk3SImaYW2NdblbAeUA3A6oOXidyV18FW7FqnLddo3s1tvua
15	higor	higor@gmail.com	1967352413	$2y$12$1ZIc2JDilLlinjt2OCrx8ebgc0WvVbXCC7FKfhRMsZFV27mq3tGha
\.


--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produtos (id, nome, categoria, preco, quantidade, imagem) FROM stdin;
2	Capacete	Acessório	120.00	7	\N
3	Luva	Acessório	55.00	8	\N
1	Bicicleta Aro 29	Bicicleta	1300.00	10	\N
4	Relógio	acessorio	49.90	12	\N
10	Lanterna	acessório	19.90	28	\N
9	Sapatilha	Tênis	90.00	20	\N
\.


--
-- Data for Name: vendas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.vendas (id, cliente_id, produto_id, quantidade, valor_total, data_venda, forma_pagamento) FROM stdin;
1	4	1	1	1500.00	2026-05-28 10:46:01.955442	\N
2	4	2	1	120.00	2026-05-28 10:46:14.234367	\N
3	4	2	1	120.00	2026-05-28 10:46:19.313773	\N
4	4	3	2	110.00	2026-05-28 10:49:34.791032	\N
5	4	3	1	55.00	2026-05-28 10:50:38.67685	\N
6	4	3	1	55.00	2026-05-28 10:57:33.147674	PIX
7	4	2	1	120.00	2026-05-28 11:16:34.53815	PIX
8	12	3	1	55.00	2026-05-28 11:17:10.641117	Cartão
9	12	1	1	1500.00	2026-06-02 14:50:33.3576	PIX
10	5	1	2	2600.00	2026-06-02 16:35:38.183082	Dinheiro
11	12	3	1	55.00	2026-06-02 16:53:37.28796	PIX
12	5	3	1	55.00	2026-06-02 16:59:24.070661	PIX
13	5	4	2	30.00	2026-06-09 14:30:56.550202	Dinheiro
14	12	9	1	90.00	2026-06-09 14:44:38.088701	PIX
15	14	10	2	39.80	2026-06-09 15:00:29.168129	PIX
16	15	9	2	180.00	2026-06-09 15:05:14.240382	PIX
\.


--
-- Name: administradores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.administradores_id_seq', 3, true);


--
-- Name: clientes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.clientes_id_seq', 15, true);


--
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produtos_id_seq', 10, true);


--
-- Name: vendas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vendas_id_seq', 16, true);


--
-- Name: administradores administradores_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.administradores
    ADD CONSTRAINT administradores_email_key UNIQUE (email);


--
-- Name: administradores administradores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.administradores
    ADD CONSTRAINT administradores_pkey PRIMARY KEY (id);


--
-- Name: clientes clientes_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_email_key UNIQUE (email);


--
-- Name: clientes clientes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (id);


--
-- Name: produtos produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


--
-- Name: vendas vendas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas
    ADD CONSTRAINT vendas_pkey PRIMARY KEY (id);


--
-- Name: vendas vendas_cliente_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas
    ADD CONSTRAINT vendas_cliente_id_fkey FOREIGN KEY (cliente_id) REFERENCES public.clientes(id);


--
-- Name: vendas vendas_produto_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas
    ADD CONSTRAINT vendas_produto_id_fkey FOREIGN KEY (produto_id) REFERENCES public.produtos(id);


--
-- PostgreSQL database dump complete
--

\unrestrict fgebxpJCoxFqaXSoZJpR6Ss7e7KVx7IIfDSIv4H6KaXgGeOAwmjKSr2JdhtH6Sk

