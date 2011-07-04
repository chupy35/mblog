-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 04-07-2011 a las 03:43:33
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `mblog`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `comments`
-- 

CREATE TABLE `comments` (
  `id` tinyint(3) unsigned NOT NULL,
  `user` varchar(40) collate utf8_spanish_ci NOT NULL,
  `comment` varchar(10000) collate utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `mentions`
-- 

CREATE TABLE `mentions` (
  `by` varchar(20) collate utf8_spanish_ci NOT NULL,
  `id_notice` tinyint(3) unsigned NOT NULL,
  `time` text collate utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `notices`
-- 

CREATE TABLE `notices` (
  `id` tinyint(4) NOT NULL auto_increment,
  `username` varchar(20) collate utf8_bin NOT NULL,
  `title` varchar(100) collate utf8_bin NOT NULL,
  `category` varchar(50) collate utf8_bin NOT NULL,
  `notice` longtext collate utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `reported` tinyint(4) default '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `users`
-- 

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL auto_increment,
  `username` varchar(20) collate utf8_bin NOT NULL,
  `password` varchar(100) character set utf8 collate utf8_spanish_ci NOT NULL,
  `email` varchar(50) character set utf8 collate utf8_spanish_ci NOT NULL,
  `fullname` varchar(50) collate utf8_bin NOT NULL,
  `description` text character set utf8 collate utf8_spanish_ci NOT NULL,
  `aboutme` text character set utf8 collate utf8_spanish_ci NOT NULL,
  `location` varchar(20) character set utf8 collate utf8_spanish_ci NOT NULL,
  `category` varchar(2000) collate utf8_bin default 'Not category; ',
  `need_login_comentary` tinyint(1) NOT NULL,
  `avatar` varchar(200) character set utf8 collate utf8_spanish_ci NOT NULL,
  `permise` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;
