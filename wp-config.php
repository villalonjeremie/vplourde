<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'coaching_carrieres');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#xc5ekSXG3T|KN/[)(~k)$a4_eog%?A+(^p/)Ua;!H9:,N!&O38G.X8@n9adV04}');
define('SECURE_AUTH_KEY',  'a.19ty{-:%D(=JWu3Gc~y{,${z1q1ku,OqaI2pQ{|q Uxuy`.l|hN+@BsSwxnQEB');
define('LOGGED_IN_KEY',    '#L?kf^Sgz-zs>c!qF7Un]wZZoy71a;Udw]AO6b5)o/;$[9(%^a/X#/A?v[Rl0eVX');
define('NONCE_KEY',        'Pxy@:q]$H-:*{KLI=k%g{OHI)btfEa8(n0vJm:FL$:1hl5(+k>i?tbg<;J)g4hqW');
define('AUTH_SALT',        '(-8T<5j8E_a^O5VS}}kaL#Amxpm*36lSo-Q4tJ%vQ1YHm+~sGHaQsd<u]tm,6b(~');
define('SECURE_AUTH_SALT', ') a@|L2U}<9]$&W4>v03)TU*^@wYZS372w  Wr2E_)%Hz8gte2+4( U*jc}D}`zd');
define('LOGGED_IN_SALT',   '+.Vl/{2{bB0p0KyQ.}w&FVMjhCd}cA}bw&jFbx:;ZO}n1pQxxz(C~]_0E>2?BH_M');
define('NONCE_SALT',       '-H#R6[J*+,J1(e+i6doVsprU>+!>c#qi|~Rvcy}[ eQH_D?!UzZE hKX6oDfS|Y[');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');