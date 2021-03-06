CREATE TABLE sf_guard_user_information (id BIGINT, user_id BIGINT NOT NULL, id_institution BIGINT, id_country BIGINT, city TEXT, state TEXT, address TEXT, telephone TEXT, motivation TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, key TEXT, visits BIGINT DEFAULT 0, PRIMARY KEY(id));
CREATE TABLE tb_administrativedivision (id_administrativedivision BIGINT, id_administrativedivisiontype BIGINT NOT NULL, id_parent BIGINT, dmdvname TEXT NOT NULL, dmdviso TEXT, created_at TIME, updated_at TIME, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_administrativedivision));
CREATE TABLE tb_administrativedivisiontype (id_administrativedivisiontype BIGINT, dmdvtpnombre TEXT NOT NULL, PRIMARY KEY(id_administrativedivisiontype));
CREATE TABLE tb_contactperson (id_contactperson BIGINT, cnprfirstname TEXT, cnprmiddlename TEXT, cnprlastname TEXT, id_institution BIGINT, cnpremail TEXT, cnprtelephone TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_contactperson));
CREATE TABLE tb_crop (id_crop BIGINT, crpname TEXT NOT NULL, crpscientificname TEXT NOT NULL, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_crop));
CREATE TABLE tb_donor (id_donor BIGINT, dnrname TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_donor));
CREATE TABLE tb_experimentaldesign (id_experimentaldesign BIGINT, xpdsname TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_experimentaldesign));
CREATE TABLE tb_fieldhelp (id_fieldhelp BIGINT, flhlmodule TEXT, flhlsession TEXT, flhlfield TEXT, flhltexthelp TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_fieldhelp));
CREATE TABLE tb_institution (id_institution BIGINT, insname TEXT, id_country BIGINT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_institution));
CREATE TABLE tb_modulehelp (id_modulehelp BIGINT, mdhlmodule TEXT, mdhltexthelp TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_modulehelp));
CREATE TABLE tb_project (id_project BIGINT, prjname TEXT, id_leadofproject BIGINT, id_projectimplementinginstitutions BIGINT, prjprojectimplementingperiodstartdate DATE, prjprojectimplementingperiodenddate DATE, id_donor BIGINT, prjabstract TEXT, prjkeywords TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_project));
CREATE TABLE tb_projectdocument (id_projectdocument BIGINT, id_project BIGINT NOT NULL, prdcfile TEXT, prdcdescription TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_projectdocument));
CREATE TABLE tb_rolecontactperson (id_rolecontactperson BIGINT, rcpname TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_rolecontactperson));
CREATE TABLE tb_traitclass (id_traitclass BIGINT, trclname TEXT NOT NULL, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_traitclass));
CREATE TABLE tb_trial (id_trial BIGINT, id_project BIGINT, id_contactperson BIGINT, id_rolecontactperson BIGINT, trlimplementingperiodstartdate DATE, trlimplementingperiodenddate DATE, id_triallocation BIGINT, trltrialname TEXT, trltrialobjectives TEXT, trltriallicense TEXT, trltrialpermissions TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_trial));
CREATE TABLE tb_trialinfo (id_trialinfo BIGINT, id_trial BIGINT, trnfnumberofreplicates BIGINT, id_experimentaldesign BIGINT, trnftreatmentnumber BIGINT, trnftreatmentnameandcode TEXT, trnfplantingsowingstartdate DATE, trnfplantingsowingenddate DATE, trnfphysiologicalmaturitystardate DATE, trnfphysiologicalmaturityenddate DATE, trnfharveststartdate DATE, trnfharvestenddate DATE, id_crop BIGINT, trnfdatafile TEXT, trnfdataorresultsfile TEXT, trnfsuppplementalinformationfile TEXT, trnfweatherdatafile TEXT, trnfsoildatafile TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_trialinfo));
CREATE TABLE tb_trialinfodata (id_trialinfodata BIGINT, id_trialinfo BIGINT NOT NULL, trnfdtreplication BIGINT NOT NULL, id_variety BIGINT, id_variablesmeasured BIGINT, trnfdtvalue TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_trialinfodata));
CREATE TABLE tb_triallocation (id_triallocation BIGINT, trlcname TEXT, trlclatitude FLOAT, trlclongitude FLOAT, trlcaltitude FLOAT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_triallocation));
CREATE TABLE tb_triallocationadministrativedivision (id_triallocationadministrativedivision BIGINT, id_triallocation BIGINT, id_administrativedivision BIGINT, PRIMARY KEY(id_triallocationadministrativedivision));
CREATE TABLE tb_trialpermissiongroup (id_trialpermissiongroup BIGINT, id_trial BIGINT, id_grouppermission BIGINT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_trialpermissiongroup));
CREATE TABLE tb_trialpermissionuser (id_trialpermissionuser BIGINT, id_trial BIGINT, id_userpermission BIGINT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_trialpermissionuser));
CREATE TABLE tb_variablesmeasured (id_variablesmeasured BIGINT, id_crop BIGINT NOT NULL, id_traitclass BIGINT NOT NULL, vrmsname TEXT NOT NULL, vrmsshortname TEXT, vrmsdefinition TEXT, vrmnmethod TEXT, vrmsunit TEXT, id_ontology TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_variablesmeasured));
CREATE TABLE tb_variety (id_variety BIGINT, id_crop BIGINT NOT NULL, vrtorigin TEXT, vrtname TEXT NOT NULL, vrtsynonymous TEXT, vrtdescription TEXT, id_genebank TEXT, created_at TIMESTAMP, updated_at TIMESTAMP, id_user BIGINT, id_user_update BIGINT, PRIMARY KEY(id_variety));
CREATE TABLE sf_guard_forgot_password (user_id BIGINT NOT NULL, unique_key TEXT, expires_at TIMESTAMP NOT NULL, id BIGINT, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE sf_guard_group (name TEXT UNIQUE, description TEXT, id BIGINT, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(group_id, permission_id));
CREATE TABLE sf_guard_permission (name TEXT UNIQUE, description TEXT, id BIGINT, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE sf_guard_remember_key (user_id BIGINT, remember_key TEXT, ip_address TEXT, id BIGINT, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE sf_guard_user (first_name TEXT, last_name TEXT, email_address TEXT NOT NULL UNIQUE, username TEXT NOT NULL UNIQUE, algorithm TEXT DEFAULT 'sha1' NOT NULL, salt TEXT, password TEXT, is_active BOOLEAN DEFAULT 'true', is_super_admin BOOLEAN DEFAULT 'false', last_login TIMESTAMP, id BIGINT, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE sf_guard_user_apilog (id BIGINT, user_id BIGINT NOT NULL, api TEXT, apiurl TEXT, created_at TIMESTAMP, PRIMARY KEY(id));
CREATE TABLE sf_guard_user_downloads (id_download BIGINT, user_id BIGINT, id_trial BIGINT NOT NULL, id_crop BIGINT NOT NULL, usdwtype TEXT NOT NULL, usdwfile TEXT NOT NULL, usdwdate TIMESTAMP NOT NULL, usdwsize FLOAT, PRIMARY KEY(id_download));
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(user_id, group_id));
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(user_id, permission_id));
CREATE SEQUENCE sf_guard_user_information_id_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_administrativedivision_id_administrativedivision_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_administrativedivisiontyp_id_administrativedivisiontyp_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_contactperson_id_contactperson_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_crop_id_crop_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_donor_id_donor_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_experimentaldesign_id_experimentaldesign_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_fieldhelp_id_fieldhelp_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_institution_id_institution_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_modulehelp_id_modulehelp_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_project_id_project_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_projectdocument_id_projectdocument_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_rolecontactperson_id_rolecontactperson_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_traitclass_id_traitclass_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_trial_id_trial_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_trialinfo_id_trialinfo_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_trialinfodata_id_trialinfodata_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_triallocation_id_triallocation_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_triallocationadministrativ_id_triallocationadministrativ_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_trialpermissiongroup_id_trialpermissiongroup_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_trialpermissionuser_id_trialpermissionuser_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_variablesmeasured_id_variablesmeasured_seq INCREMENT 1 START 1;
CREATE SEQUENCE tb_variety_id_variety_seq INCREMENT 1 START 1;
CREATE SEQUENCE sf_guard_forgot_password_id_seq INCREMENT 1 START 1;
CREATE SEQUENCE sf_guard_group_id_seq INCREMENT 1 START 1;
CREATE SEQUENCE sf_guard_permission_id_seq INCREMENT 1 START 1;
CREATE SEQUENCE sf_guard_remember_key_id_seq INCREMENT 1 START 1;
CREATE SEQUENCE sf_guard_user_id_seq INCREMENT 1 START 1;
CREATE SEQUENCE sf_guard_user_apilog_id_seq INCREMENT 1 START 1;
CREATE SEQUENCE sf_guard_user_downloads_id_download_seq INCREMENT 1 START 1;
CREATE INDEX is_active_idx ON sf_guard_user (is_active);
ALTER TABLE sf_guard_user_information ADD CONSTRAINT sf_guard_user_information_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_administrativedivision ADD CONSTRAINT titi FOREIGN KEY (id_administrativedivisiontype) REFERENCES tb_administrativedivisiontype(id_administrativedivisiontype) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_contactperson ADD CONSTRAINT tb_contactperson_id_institution_tb_institution_id_institution FOREIGN KEY (id_institution) REFERENCES tb_institution(id_institution) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_institution ADD CONSTRAINT titi_5 FOREIGN KEY (id_country) REFERENCES tb_administrativedivision(id_administrativedivision) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_project ADD CONSTRAINT titi_7 FOREIGN KEY (id_projectimplementinginstitutions) REFERENCES tb_institution(id_institution) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_project ADD CONSTRAINT tb_project_id_leadofproject_tb_contactperson_id_contactperson FOREIGN KEY (id_leadofproject) REFERENCES tb_contactperson(id_contactperson) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_project ADD CONSTRAINT tb_project_id_donor_tb_donor_id_donor FOREIGN KEY (id_donor) REFERENCES tb_donor(id_donor) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_projectdocument ADD CONSTRAINT tb_projectdocument_id_project_tb_project_id_project FOREIGN KEY (id_project) REFERENCES tb_project(id_project) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trial ADD CONSTRAINT titi_9 FOREIGN KEY (id_rolecontactperson) REFERENCES tb_rolecontactperson(id_rolecontactperson) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trial ADD CONSTRAINT tb_trial_id_triallocation_tb_triallocation_id_triallocation FOREIGN KEY (id_triallocation) REFERENCES tb_triallocation(id_triallocation) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trial ADD CONSTRAINT tb_trial_id_project_tb_project_id_project FOREIGN KEY (id_project) REFERENCES tb_project(id_project) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trial ADD CONSTRAINT tb_trial_id_contactperson_tb_contactperson_id_contactperson FOREIGN KEY (id_contactperson) REFERENCES tb_contactperson(id_contactperson) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trialinfo ADD CONSTRAINT titi_10 FOREIGN KEY (id_experimentaldesign) REFERENCES tb_experimentaldesign(id_experimentaldesign) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trialinfo ADD CONSTRAINT tb_trialinfo_id_trial_tb_trial_id_trial FOREIGN KEY (id_trial) REFERENCES tb_trial(id_trial) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trialinfo ADD CONSTRAINT tb_trialinfo_id_crop_tb_crop_id_crop FOREIGN KEY (id_crop) REFERENCES tb_crop(id_crop) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trialinfodata ADD CONSTRAINT titi_11 FOREIGN KEY (id_variablesmeasured) REFERENCES tb_variablesmeasured(id_variablesmeasured) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trialinfodata ADD CONSTRAINT tb_trialinfodata_id_variety_tb_variety_id_variety FOREIGN KEY (id_variety) REFERENCES tb_variety(id_variety) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trialinfodata ADD CONSTRAINT tb_trialinfodata_id_trialinfo_tb_trialinfo_id_trialinfo FOREIGN KEY (id_trialinfo) REFERENCES tb_trialinfo(id_trialinfo) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_triallocationadministrativedivision ADD CONSTRAINT titi_14 FOREIGN KEY (id_triallocation) REFERENCES tb_triallocation(id_triallocation) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_triallocationadministrativedivision ADD CONSTRAINT titi_13 FOREIGN KEY (id_administrativedivision) REFERENCES tb_administrativedivision(id_administrativedivision) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trialpermissiongroup ADD CONSTRAINT tb_trialpermissiongroup_id_trial_tb_trial_id_trial FOREIGN KEY (id_trial) REFERENCES tb_trial(id_trial) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_trialpermissionuser ADD CONSTRAINT tb_trialpermissionuser_id_trial_tb_trial_id_trial FOREIGN KEY (id_trial) REFERENCES tb_trial(id_trial) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_variablesmeasured ADD CONSTRAINT tb_variablesmeasured_id_traitclass_tb_traitclass_id_traitclass FOREIGN KEY (id_traitclass) REFERENCES tb_traitclass(id_traitclass) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_variablesmeasured ADD CONSTRAINT tb_variablesmeasured_id_crop_tb_crop_id_crop FOREIGN KEY (id_crop) REFERENCES tb_crop(id_crop) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE tb_variety ADD CONSTRAINT tb_variety_id_crop_tb_crop_id_crop FOREIGN KEY (id_crop) REFERENCES tb_crop(id_crop) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE sf_guard_user_downloads ADD CONSTRAINT sf_guard_user_downloads_id_trial_tb_trial_id_trial FOREIGN KEY (id_trial) REFERENCES tb_trial(id_trial) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
