CREATE TABLE tx_newsextension_domain_model_category (
	title varchar(255) DEFAULT '' NOT NULL,
	subtitle varchar(255) DEFAULT '',
	description text NOT NULL,
    news int(11) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_newsextension_domain_model_news (
    category int(11) DEFAULT '0' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	content text NOT NULL,
);
