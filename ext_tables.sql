#
# Table structure for table 'tx_circular_domain_model_circular'
#
CREATE TABLE tx_circular_domain_model_circular (
	number varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	category int(11) unsigned DEFAULT '0',
	date_of_circular int(11) DEFAULT '0' NOT NULL,
	send tinyint(1) unsigned DEFAULT '0' NOT NULL,
	department int(11) unsigned DEFAULT '0',
	files varchar(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_circular_domain_model_department'
#
CREATE TABLE tx_circular_domain_model_department (
	title varchar(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_circular_domain_model_category'
#
CREATE TABLE tx_circular_domain_model_category (
	title varchar(255) DEFAULT '' NOT NULL,
);
