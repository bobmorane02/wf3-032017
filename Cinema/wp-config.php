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
define('DB_NAME', 'cinema');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'rwK8. :GP t{E~k?1&H|Zk,YpUyk#x&?G<tr0gLZ}`_P}B/zC(V3rueo]pJ&h36g');
define('SECURE_AUTH_KEY',  'eJkUFqD92Z!XHdeI2;gyW0Z^f2D.VMfnhpGphGzc;vl+=(MD(Rr3T$yeq^]Zn61-');
define('LOGGED_IN_KEY',    '_8E{aFYyb*S=@V0@hg$<*i?nZ^z|gylw>.x/yErsg]Tw`}v[NQHKEet7LCw3xdGj');
define('NONCE_KEY',        'Q0R5H+.pr><7NAmqI$TA$ ^EWeV$SRrX#l-,f2 @`>y_ot}@CBpNHR 0LbPLaOn<');
define('AUTH_SALT',        'asqyn$a{`~UNTvT|;C~/)c()Q2.A%R3l9kmj2:wL3]hSu>/A%g*;1$vcc%@~~6{y');
define('SECURE_AUTH_SALT', 'egp+Xgvsst*(;ZS-|WrJ KBU]k^Dgs/a>/3ERjveA=[A3N4G6b>ejjZ/TQ{_P|:7');
define('LOGGED_IN_SALT',   '@5#H 9&ob_aJ`|2L^Z_grj?hGC{P|EG0{x(-Lv#)5U i?vTJNvzO-&[@obod0Xc,');
define('NONCE_SALT',       'D?I=fpx3N]MgvtxE+?!3>X0q2rhiHDr:OeE:?^pvg`!#Xv._v]bO8BqlJ1`|$c$*');
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