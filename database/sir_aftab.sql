CREATE TABLE UserType (
    user_type_id INT PRIMARY KEY,
    user_type_name VARCHAR(50),
    user_email VARCHAR(50),
    user_password VARCHAR(50),
    user_role VARCHAR(50)
);

CREATE TABLE dept (
    dept_id INT PRIMARY KEY,
    dept_name VARCHAR(100),
    user_type_id INT,
    FOREIGN KEY (user_type_id) REFERENCES UserType(user_type_id)
);

CREATE TABLE destination (
    dest_id INT PRIMARY KEY,
    dest_name VARCHAR(100),
    user_type_id INT,
    FOREIGN KEY (user_type_id) REFERENCES UserType(user_type_id)
);

CREATE TABLE employee (
    emp_id INT PRIMARY KEY,
    emp_name VARCHAR(100),
    emp_f_name VARCHAR(100),
    emp_cnic VARCHAR(100) UNIQUE,
    emp_contact VARCHAR(20),
    emp_hire_date DATE,
    dept_id INT,
    dest_id INT,
    FOREIGN KEY (dept_id) REFERENCES dept(dept_id),
    FOREIGN KEY (dest_id) REFERENCES destination(dest_id)
);

CREATE TABLE project (
    pro_id INT PRIMARY KEY,
    pro_title VARCHAR(100),
    pro_description TEXT,
    pro_start_date DATE,
    pro_end_date DATE,
    pro_budget DECIMAL(10,2),
    user_type_id INT,
    pro_status VARCHAR(50),
    FOREIGN KEY (user_type_id) REFERENCES UserType(user_type_id)
);

CREATE TABLE ProjectManager (
    pro_mangr_id INT PRIMARY KEY,
    pro_mangr_status VARCHAR(50),
    pro_id INT,
    emp_id INT,
    FOREIGN KEY (pro_id) REFERENCES project(pro_id),
    FOREIGN KEY (emp_id) REFERENCES employee(emp_id)
);

CREATE TABLE Task (
    task_id INT PRIMARY KEY,
    task_name VARCHAR(100),
    task_starting_date DATE,
    task_ending_date DATE,
    pro_id INT,
    emp_id INT,
    FOREIGN KEY (pro_id) REFERENCES project(pro_id),
    FOREIGN KEY (emp_id) REFERENCES employee(emp_id)
);

CREATE TABLE employeeAttendRecord (
    emp_att_rec_id INT PRIMARY KEY,
    emp_att_rec_date DATE,
    emp_att_rec_marking VARCHAR(50),
    emp_id INT,
    FOREIGN KEY (emp_id) REFERENCES employee(emp_id)
);

CREATE TABLE employeeSalary (
    emp_id INT PRIMARY KEY,
    emp_sal_month VARCHAR(20),
    total_present_days INT,
    total_absent_days INT,
    total_leave_days INT,
    emp_sal_gross_amt DECIMAL(10,2),
    FOREIGN KEY (emp_id) REFERENCES employee(emp_id)
);

CREATE TABLE employeeSalaryRecord (
    emp_sal_rec_id INT PRIMARY KEY,
    emp_sal_rec_date DATE,
    emp_sal_rec_amount DECIMAL(10,2),
    emp_sal_rec_status VARCHAR(50),
    emp_id INT,
    FOREIGN KEY (emp_id) REFERENCES employee(emp_id)
);

CREATE TABLE supplier (
    sup_id INT PRIMARY KEY,
    sup_name VARCHAR(100),
    sup_address TEXT,
    sup_contact VARCHAR(50)
);

CREATE TABLE materialNature (
    material_type_id INT PRIMARY KEY,
    material_type_name VARCHAR(100)
);

CREATE TABLE materialDetail (
    material_id INT PRIMARY KEY,
    material_sup_desc TEXT,
    material_quantity INT,
    sup_id INT,
    pro_id INT,
    material_type_id INT,
    FOREIGN KEY (sup_id) REFERENCES supplier(sup_id),
    FOREIGN KEY (pro_id) REFERENCES project(pro_id),
    FOREIGN KEY (material_type_id) REFERENCES materialNature(material_type_id)
);

CREATE TABLE projectDocument (
    pro_doc_id INT PRIMARY KEY,
    pro_doc_type VARCHAR(50),
    pro_doc_name VARCHAR(100),
    pro_id INT,
    FOREIGN KEY (pro_id) REFERENCES project(pro_id)
);









































-- file ends here
-- <?php

-- use Illuminate\Database\Migrations\Migration;
-- use Illuminate\Database\Schema\Blueprint;
-- use Illuminate\Support\Facades\Schema;
-- aor kuch ye hy tabels in ko bhi analys karo pehly phir batao kya kerna chahye 



--      public function up(): void

-- --     {

--         // ========== USER TYPES ==========

--         Schema::create('user_types', function (Blueprint $table) {

--             $table->id('user_type_id');

--             $table->string('user_type_name', 50);

--             $table->timestamps();

--         });



--         // ========== DEPARTMENTS ==========

--         Schema::create('departments', function (Blueprint $table) {

--             $table->id('dept_id');

--             $table->string('dept_name', 100);

--             $table->foreignId('user_type_id')->constrained('user_types')->onDelete('cascade');

--             $table->timestamps();

--         });



--         // ========== DESTINATIONS ==========

--         Schema::create('destinations', function (Blueprint $table) {

--             $table->id('dest_id');

--             $table->string('dest_name', 100);

--             $table->foreignId('user_type_id')->constrained('user_types')->onDelete('cascade');

--             $table->timestamps();

--         });



--         // ========== CLIENTS / USERS ==========

--         Schema::create('clients', function (Blueprint $table) {

--             $table->id('client_id');

--             $table->string('name', 255);

--             $table->string('contact_person', 255)->nullable();

--             $table->string('phone', 50)->nullable();

--             $table->string('email', 255)->nullable();

--             $table->string('address', 255)->nullable();

--             $table->date('join_date')->nullable();

--             $table->timestamps();

--         });



--         // ========== EMPLOYEES ==========

--         Schema::create('employees', function (Blueprint $table) {

--             $table->id('emp_id');

--             $table->string('first_name', 100);

--             $table->string('last_name', 100);

--             $table->string('emp_cnic', 100)->unique();

--             $table->string('phone', 50)->nullable();

--             $table->string('email', 255)->nullable();

--             $table->date('hire_date')->nullable();

--             $table->decimal('salary', 12, 2)->default(0);

--             $table->string('specialization', 150)->nullable();

--             $table->foreignId('dept_id')->constrained('departments')->onDelete('cascade');

--             $table->foreignId('dest_id')->constrained('destinations')->onDelete('cascade');

--             $table->timestamps();

--         });



--         // ========== EQUIPMENT ==========

--         Schema::create('equipment', function (Blueprint $table) {

--             $table->id('equip_id');

--             $table->string('name', 255);

--             $table->string('type', 100)->nullable();

--             $table->text('description')->nullable();

--             $table->date('purchase_date')->nullable();

--             $table->decimal('purchase_price', 12, 2)->default(0);

--             $table->string('maintenance_schedule', 150)->nullable();

--             $table->string('status', 50)->default('Available');

--             $table->string('current_location', 150)->nullable();

--             $table->timestamps();

--         });



--         // ========== MATERIALS ==========

--         Schema::create('materials', function (Blueprint $table) {

--             $table->id('material_id');

--             $table->string('name', 150);

--             $table->text('description')->nullable();

--             $table->string('unit', 50)->nullable();

--             $table->decimal('unit_price', 12, 2)->default(0);

--             $table->integer('min_stock')->default(0);

--             $table->integer('current_stock')->default(0);

--             $table->timestamps();

--         });



--         // ========== SUPPLIERS ==========

--         Schema::create('suppliers', function (Blueprint $table) {

--             $table->id('sup_id');

--             $table->string('name', 100);

--             $table->text('address')->nullable();

--             $table->string('contact', 50)->nullable();

--             $table->timestamps();

--         });



--         // ========== SUBCONTRACTORS ==========

--         Schema::create('subcontractors', function (Blueprint $table) {

--             $table->id('sub_id');

--             $table->string('company_name', 255);

--             $table->string('contact_person', 150)->nullable();

--             $table->string('specialization', 150)->nullable();

--             $table->string('phone', 50)->nullable();

--             $table->string('email', 255)->nullable();

--             $table->text('address')->nullable();

--             $table->date('contract_start_date')->nullable();

--             $table->timestamps();

--         });



--         // ========== PROJECTS ==========

--         Schema::create('projects', function (Blueprint $table) {

--             $table->id('pro_id');

--             $table->string('name', 255);

--             $table->text('description')->nullable();

--             $table->string('location', 255)->nullable();

--             $table->date('start_date')->nullable();

--             $table->date('estimated_end_date')->nullable();

--             $table->date('actual_end_date')->nullable();

--             $table->decimal('budget', 14, 2)->default(0);

--             $table->string('status', 100)->default('Pending');

--             $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');

--             $table->foreignId('project_manager_id')->nullable()->constrained('employees')->onDelete('set null');

--             $table->timestamps();

--         });



--         // ========== DOCUMENTS ==========

--         Schema::create('documents', function (Blueprint $table) {

--             $table->id('document_id');

--             $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');

--             $table->string('document_type', 100);

--             $table->string('file_name', 255);

--             $table->string('file_path', 255)->nullable();

--             $table->date('upload_date')->nullable();

--             $table->date('expiring_date')->nullable();

--             $table->string('status', 50)->default('Active');

--             $table->timestamps();

--         });



--         // ========== FINANCIAL TRANSACTIONS ==========

--         Schema::create('financial_transactions', function (Blueprint $table) {

--             $table->id('transaction_id');

--             $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');

--             $table->string('type', 100);

--             $table->decimal('amount', 14, 2)->default(0);

--             $table->date('transaction_date')->nullable();

--             $table->text('description')->nullable();

--             $table->string('payment_method', 100)->nullable();

--             $table->string('reference_number', 150)->nullable();

--             $table->timestamps();

--         });



--         // ========== WORK ORDERS ==========

--         Schema::create('work_orders', function (Blueprint $table) {

--             $table->id('work_order_id');

--             $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');

--             $table->text('description')->nullable();

--             $table->string('status', 100)->default('Pending');

--             $table->foreignId('assigned_to')->nullable()->constrained('employees')->onDelete('set null');

--             $table->date('start_date')->nullable();

--             $table->date('due_date')->nullable();

--             $table->date('completion_date')->nullable();

--             $table->string('priority', 50)->nullable();

--             $table->timestamps();

--         });



--         // ========== PIVOT TABLES ==========

--         Schema::create('project_employees', function (Blueprint $table) {

--             $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');

--             $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');

--             $table->string('role', 100)->nullable();

--             $table->date('assignment_start_date')->nullable();

--             $table->date('assignment_end_date')->nullable();

--             $table->primary(['project_id','employee_id']);

--             $table->timestamps();

--         });



--         Schema::create('project_equipment', function (Blueprint $table) {

--             $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');

--             $table->foreignId('equipment_id')->constrained('equipment')->onDelete('cascade');

--             $table->date('usage_start_date')->nullable();

--             $table->date('usage_end_date')->nullable();

--             $table->primary(['project_id','equipment_id']);

--             $table->timestamps();

--         });



--         Schema::create('project_materials', function (Blueprint $table) {

--             $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');

--             $table->foreignId('material_id')->constrained('materials')->onDelete('cascade');

--             $table->integer('quantity')->default(0);

--             $table->date('usage_date')->nullable();

--             $table->primary(['project_id','material_id']);

--             $table->timestamps();

--         });



--         Schema::create('project_subcontractors', function (Blueprint $table) {

--             $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');

--             $table->foreignId('subcontractor_id')->constrained('subcontractors')->onDelete('cascade');

--             $table->decimal('contract_amount', 14, 2)->default(0);

--             $table->text('service_description')->nullable();

--             $table->date('start_date')->nullable();

--             $table->date('end_date')->nullable();

--             $table->primary(['project_id','subcontractor_id']);

--             $table->timestamps();

--         });

--     }

--     public function down(): void
--     {
--         Schema::dropIfExists('project_subcontractors');
--         Schema::dropIfExists('project_materials');
--         Schema::dropIfExists('project_equipment');
--         Schema::dropIfExists('project_employees');
--         Schema::dropIfExists('work_orders');
--         Schema::dropIfExists('financial_transactions');
--         Schema::dropIfExists('documents');
--         Schema::dropIfExists('projects');
--         Schema::dropIfExists('subcontractors');
--         Schema::dropIfExists('suppliers');
--         Schema::dropIfExists('materials');
--         Schema::dropIfExists('equipment');
--         Schema::dropIfExists('employees');
--         Schema::dropIfExists('clients');
--         Schema::dropIfExists('destinations');
--         Schema::dropIfExists('departments');
--         Schema::dropIfExists('user_types');
--     }
-- };
