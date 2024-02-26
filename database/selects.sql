SELECT * FROM doses
JOIN conditions_doses ON conditions_doses.doseId = doses.id
JOIN conditions ON conditions_doses.conditionId = conditions.id
JOIN criterias ON conditions.criteriaId = criterias.id
WHERE medicationId = 7

SELECT * FROM conditions_doses
WHERE (conditions.criteriaId = 2 AND 40 BETWEEN conditions.min AND conditions.max) 