SELECT e.first_name, e.last_name, dp.dept_name, max(de.to_date - de.from_date) as dias_trabalhados
FROM employees e 
INNER JOIN dept_emp de ON e.emp_no = de.emp_no
INNER JOIN departments dp ON de.dept_no = dp.dept_no
LIMIT 10;