SELECT * FROM crud.ads;

CREATE DATABASE IF NOT EXISTS `crud`
DEFAULT CHARACTER SET `utf8`
DEFAULT COLLATE `utf8_general_ci`;

USE `crud`;

select year(created_at) as `year`,
	monthname(created_at) as `month`,
    count(id) as `count`
from ads
group by `year`, `month`
order by min(created_at) desc;

