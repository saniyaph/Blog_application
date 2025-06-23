--create table employeee
create table employeee(emp_id int unique, firstname varchar2(50),lastname varchar2(50),department varchar2(50),salary int, age int);
--describe table
desc employeee;
--add column to address
alter table employeee add address varchar2(50)

--change datatype of saalary col
alter table employeee modify salary decimal(10,2)

--insert 5 emps
insert all
into employeee values(1,'tom','jones','IT',25000,25,'Mumbai')
into employeee values(2,'jerry','jones','Sales',65000,45,'Banglore')
into employeee values(3,'cherry','jones','IT',75000,65,'Pune')
into employeee values(4,'peter','jones','Sales',35000,35,'Hydrabad')
into employeee values(5,'jack','jones','Accounts',85000,55,'Mumbai')
select * from dual

--update salary
update employeee set salary=100000 where emp_id=5

--delete
delete from employeee where emp_id=4

--show
select * from employeee

--rename col
alter table employeee rename column salary to emp_sal

--drop col
alter table employeee drop column address

-- retirves names of emp
select firstname from employeee where department='IT'

--department 
create table deptt (dept_id int, department varchar2(50))

--3 records
insert all 
into deptt values(1,'IT')
into deptt values(2,'Sales')
into deptt values(3,'Accounts')
select * from dual

--total number of emps(count)
select count(emp_id) from employeee

--avg salary of emps
select avg(emp_sal) from employeee

--max
select max(emp_sal ) from employeee

--min
select min(emp_sal) from employeee

select upper(firstname), upper(lastname) from employeee

--highest salary top2
select firstname,emp_sal from employeee order by emp_sal desc fetch first 3 row only

select department from employeee group by department having count(emp_id)>1 

--joins
alter table employeee add constraint fk foreign key  (department) references deptt(department)
alter table deptt add constraint pk primary key  (department)

--inner join
select employeee.firstname, employeee.department, deptt.dept_id from employeee inner join deptt on employeee.department=deptt.department
--outer
select employeee.firstname, employeee.department, deptt.dept_id from employeee full outer join deptt on employeee.department=deptt.department
--left
select employeee.firstname, employeee.department, deptt.dept_id from employeee left join deptt on employeee.department=deptt.department
--right
select employeee.firstname, employeee.department, deptt.dept_id from employeee right join deptt on employeee.department=deptt.department
--cross
select * from employeee cross join deptt 

--self join
create table empp(id int , name varchar2(50),m_id int)
insert all 
into empp values(1,'tom',3)
into empp values(2,'peter',1)
into empp values(3,'jerry',2)
select * from dual
select e1.name as emp,e2.name as manager from empp e1 right join empp e2 on e1.id=e2.m_id

--procedure
create table employy (id int, name varchar2(50))
create or replace procedure add_emp(
    id int, name varchar2
)
as 
begin
insert into employy values(id,name);
end;
create or replace procedure update_emp(
    i int, n varchar2
)
as 
begin
update employy set name = n where id = i;
end;

create or replace procedure delete_emp(
    i int
)
as 
begin
delete from employy where id = i;
end;



begin
add_emp(1,'tom');
end;


begin
delete_emp(1);
end;
select * from employy

create or replace procedure show_Data
as 
begin
for emp_rec in(select * from employeee) loop
    DBMS_OUTPUT.PUT_LINE(emp_rec.firstname||' '||emp_rec.lastname);
END LOOP;
END;

begin
show_Data();
end;

--trigger
create table emp101(id int,name varchar2(50),salary int)

create table bck_emp11(e_id int, e_name varchar2(50),salary int)

create or replace trigger added
after insert on emp101
for each row 
begin
insert into bck_emp11 values(:new.id,:new.name,:new.salary);
end;

create table updated_Sal(e_id int, e_name varchar2(50),salary int)
create or replace trigger update_sal1
before update on emp101
for each row 
begin
if :new.salary >100000 then
insert into updated_Sal values(:new.id,:new.name,:new.salary);
end if;
end;

create table ex_emp(id int, name varchar2(50),salary int)
create or replace trigger delete_empp
before delete on emp101
for each row 
begin
insert into ex_emp values(:new.id,:new.name,:new.salary);
end;

insert into emp101 values(2,'jerry',150000)
update emp101 set salary=200000 where id=2
insert into emp101 values(1,'tom',54000)
delete from emp101 where id=1

select * from bck_emp11
select * from ex_emp
select * from updated_Sal
---subquery
create table depttt(dept_id int primary key, dept_name varchar2(50))
create table emp_sub(id int,name varchar2(50), salary int,dept_id int references depttt (dept_id))

insert all
into depttt values(1,'IT')
into depttt values(2,'Account')
into depttt values(3,'Sales')
select * from dual;
insert all 
into emp_sub values(1,'tom',50000,1)
into emp_sub values(2,'jack',50000,2)
into emp_sub values(3,'peter',500,3)
into emp_sub values(4,'harry',4000,2)
into emp_sub values(5,'jerry',4444,1)
select * from dual;
--emp from it dept
select name from emp_sub where dept_id=(select dept_id from depttt where dept_name ='IT')
--highest sal
select sum(salary) from emp_sub where dept_id=(select dept_id from depttt where dept_name ='IT')
