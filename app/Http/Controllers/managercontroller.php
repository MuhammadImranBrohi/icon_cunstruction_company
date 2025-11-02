<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * 📊 DASHBOARD FUNCTIONS
     */
    public function index()
    {
        // Dashboard statistics data
        $stats = [
            'total_projects' => 12,
            'ongoing_projects' => 5,
            'completed_projects' => 7,
            'total_staff' => 45,
            'active_staff' => 42,
            'total_tasks' => 156,
            'completed_tasks' => 120,
            'pending_tasks' => 36,
            'budget_utilization' => 65,
        ];

        // Recent activities
        $recent_activities = [
            ['project' => 'Office Building', 'activity' => 'Foundation completed', 'time' => '2 hours ago'],
            ['project' => 'Residential Complex', 'activity' => 'Material delivered', 'time' => '5 hours ago'],
            ['project' => 'Shopping Mall', 'activity' => 'Site inspection passed', 'time' => '1 day ago'],
        ];

        return view('cuns_manager.dashboard.index', compact('stats', 'recent_activities'));
    }

    /**
     * 🏗️ PROJECT MANAGEMENT FUNCTIONS
     */
    public function projectsIndex()
    {
        $projects = [
            [
                'id' => 1,
                'name' => 'Office Building Construction',
                'status' => 'In Progress',
                'progress' => 65,
                'start_date' => '2024-01-15',
                'end_date' => '2024-06-30',
                'budget' => '₹2,50,00,000',
                'manager' => 'Rajesh Kumar'
            ],
            [
                'id' => 2,
                'name' => 'Residential Complex',
                'status' => 'Completed',
                'progress' => 100,
                'start_date' => '2023-11-01',
                'end_date' => '2024-03-15',
                'budget' => '₹1,80,00,000',
                'manager' => 'Priya Sharma'
            ]
        ];

        return view('cuns_manager.projects.index', compact('projects'));
    }

    public function projectsCreate()
    {
        return view('cuns_manager.projects.create');
    }

    public function projectsShow($id)
    {
        $project = [
            'id' => $id,
            'name' => 'Office Building Construction',
            'description' => 'Construction of 10-story office building with parking facility',
            'status' => 'In Progress',
            'progress' => 65,
            'start_date' => '2024-01-15',
            'end_date' => '2024-06-30',
            'budget' => '₹2,50,00,000',
            'manager' => 'Rajesh Kumar',
            'client' => 'ABC Corporation',
            'location' => 'Sector 62, Noida'
        ];

        return view('cuns_manager.projects.view', compact('project'));
    }

    public function projectsEdit($id)
    {
        $project = [
            'id' => $id,
            'name' => 'Office Building Construction',
            'description' => 'Construction of 10-story office building',
            'status' => 'In Progress',
            'budget' => '25000000',
            'start_date' => '2024-01-15',
            'end_date' => '2024-06-30'
        ];

        return view('cuns_manager.projects.edit', compact('project'));
    }

    public function projectsTimeline($id)
    {
        $timeline = [
            'project_id' => $id,
            'project_name' => 'Office Building Construction',
            'milestones' => [
                ['name' => 'Site Preparation', 'status' => 'completed', 'date' => '2024-01-30'],
                ['name' => 'Foundation', 'status' => 'completed', 'date' => '2024-02-28'],
                ['name' => 'Structure', 'status' => 'in_progress', 'date' => '2024-04-15'],
                ['name' => 'Electrical & Plumbing', 'status' => 'pending', 'date' => '2024-05-20'],
                ['name' => 'Finishing', 'status' => 'pending', 'date' => '2024-06-15'],
            ]
        ];

        return view('cuns_manager.projects.timeline', compact('timeline'));
    }

    /**
     * 👷 STAFF MANAGEMENT FUNCTIONS
     */
    public function staffEmployees()
    {
        $employees = [
            [
                'id' => 1,
                'name' => 'Rahul Sharma',
                'position' => 'Site Engineer',
                'department' => 'Engineering',
                'contact' => '9876543210',
                'status' => 'Active'
            ],
            [
                'id' => 2,
                'name' => 'Priya Singh',
                'position' => 'Safety Officer',
                'department' => 'Safety',
                'contact' => '9876543211',
                'status' => 'Active'
            ]
        ];

        return view('cuns_manager.staff.employees', compact('employees'));
    }

    public function staffAttendance()
    {
        $attendance = [
            'total_staff' => 45,
            'present_today' => 42,
            'absent_today' => 3,
            'attendance_rate' => 93.3,
            'daily_log' => [
                ['date' => '2024-03-20', 'present' => 43, 'absent' => 2],
                ['date' => '2024-03-19', 'present' => 44, 'absent' => 1],
                ['date' => '2024-03-18', 'present' => 42, 'absent' => 3],
            ]
        ];

        return view('cuns_manager.attendance.index', compact('attendance'));
    }

    public function staffShifts()
    {
        $shifts = [
            [
                'shift_name' => 'Morning Shift',
                'timing' => '08:00 - 16:00',
                'workers_count' => 25,
                'supervisor' => 'Mohan Lal'
            ],
            [
                'shift_name' => 'Evening Shift',
                'timing' => '16:00 - 00:00',
                'workers_count' => 20,
                'supervisor' => 'Suresh Kumar'
            ]
        ];

        return view('cuns_manager.staff.shifts', compact('shifts'));
    }

    public function staffLeaves()
    {
        $leave_requests = [
            [
                'id' => 1,
                'employee_name' => 'Rahul Sharma',
                'leave_type' => 'Sick Leave',
                'start_date' => '2024-03-22',
                'end_date' => '2024-03-24',
                'status' => 'Pending'
            ],
            [
                'id' => 2,
                'employee_name' => 'Priya Singh',
                'leave_type' => 'Casual Leave',
                'start_date' => '2024-03-25',
                'end_date' => '2024-03-26',
                'status' => 'Approved'
            ]
        ];

        return view('cuns_manager.staff.leaves', compact('leave_requests'));
    }

    public function staffPerformance()
    {
        $performance_data = [
            'total_employees' => 45,
            'excellent' => 15,
            'good' => 20,
            'average' => 8,
            'needs_improvement' => 2,
            'top_performers' => [
                ['name' => 'Rahul Sharma', 'department' => 'Engineering', 'rating' => 4.8],
                ['name' => 'Priya Singh', 'department' => 'Safety', 'rating' => 4.7],
                ['name' => 'Mohan Lal', 'department' => 'Supervision', 'rating' => 4.6],
            ]
        ];

        return view('cuns_manager.performance.index', compact('performance_data'));
    }

    /**
     * 📦 MATERIAL MANAGEMENT FUNCTIONS
     */
    public function materialsInventory()
    {
        $inventory = [
            [
                'material_name' => 'Cement',
                'category' => 'Construction',
                'current_stock' => 500,
                'unit' => 'Bags',
                'min_stock' => 100,
                'status' => 'Adequate'
            ],
            [
                'material_name' => 'Steel Bars',
                'category' => 'Structural',
                'current_stock' => 2000,
                'unit' => 'KG',
                'min_stock' => 500,
                'status' => 'Adequate'
            ],
            [
                'material_name' => 'Bricks',
                'category' => 'Construction',
                'current_stock' => 8000,
                'unit' => 'Pieces',
                'min_stock' => 2000,
                'status' => 'Adequate'
            ]
        ];

        return view('cuns_manager.materials.index', compact('inventory'));
    }

    public function materialsOrders()
    {
        $orders = [
            [
                'order_id' => 'ORD-001',
                'material_name' => 'Cement',
                'quantity' => 200,
                'supplier' => 'ABC Suppliers',
                'order_date' => '2024-03-20',
                'status' => 'Delivered'
            ],
            [
                'order_id' => 'ORD-002',
                'material_name' => 'Steel Bars',
                'quantity' => 500,
                'supplier' => 'XYZ Steel',
                'order_date' => '2024-03-22',
                'status' => 'Pending'
            ]
        ];

        return view('cuns_manager.materials.orders', compact('orders'));
    }

    public function materialsSuppliers()
    {
        $suppliers = [
            [
                'id' => 1,
                'name' => 'ABC Suppliers',
                'contact_person' => 'Rajesh Kumar',
                'phone' => '9876543210',
                'materials' => 'Cement, Sand, Bricks',
                'rating' => 4.5
            ],
            [
                'id' => 2,
                'name' => 'XYZ Steel',
                'contact_person' => 'Mohan Singh',
                'phone' => '9876543211',
                'materials' => 'Steel Bars, TMT',
                'rating' => 4.3
            ]
        ];

        return view('cuns_manager.materials.suppliers', compact('suppliers'));
    }

    public function materialsUsage()
    {
        $usage_data = [
            'total_materials' => 15,
            'materials_used_this_month' => 8,
            'materials_available' => 7,
            'usage_trend' => [
                ['month' => 'Jan', 'cement' => 300, 'steel' => 1500, 'bricks' => 5000],
                ['month' => 'Feb', 'cement' => 450, 'steel' => 1800, 'bricks' => 6500],
                ['month' => 'Mar', 'cement' => 380, 'steel' => 1600, 'bricks' => 5800],
            ]
        ];

        return view('cuns_manager.materials.usage', compact('usage_data'));
    }

    /**
     * 💰 FINANCIAL MANAGEMENT FUNCTIONS
     */
    public function financeBudget()
    {
        $budget_data = [
            'total_budget' => '₹5,00,00,000',
            'allocated' => '₹3,20,00,000',
            'utilized' => '₹2,10,00,000',
            'remaining' => '₹1,10,00,000',
            'projects' => [
                ['name' => 'Office Building', 'allocated' => '₹2,50,00,000', 'utilized' => '₹1,60,00,000'],
                ['name' => 'Residential Complex', 'allocated' => '₹1,80,00,000', 'utilized' => '₹1,80,00,000'],
                ['name' => 'Shopping Mall', 'allocated' => '₹70,00,000', 'utilized' => '₹50,00,000'],
            ]
        ];

        return view('cuns_manager.finance.index', compact('budget_data'));
    }

    public function financeExpenses()
    {
        $expenses = [
            [
                'date' => '2024-03-20',
                'category' => 'Material Purchase',
                'description' => 'Cement and Steel',
                'amount' => '₹2,50,000',
                'project' => 'Office Building'
            ],
            [
                'date' => '2024-03-19',
                'category' => 'Labor Payment',
                'description' => 'Monthly wages',
                'amount' => '₹1,80,000',
                'project' => 'Residential Complex'
            ]
        ];

        return view('cuns_manager.finance.expense_form', compact('expenses'));
    }

    public function financePayroll()
    {
        $payroll_data = [
            'total_employees' => 45,
            'total_salary' => '₹12,50,000',
            'pending_payments' => 3,
            'employees' => [
                ['name' => 'Rahul Sharma', 'position' => 'Site Engineer', 'salary' => '₹45,000', 'status' => 'Paid'],
                ['name' => 'Priya Singh', 'position' => 'Safety Officer', 'salary' => '₹38,000', 'status' => 'Paid'],
                ['name' => 'Mohan Lal', 'position' => 'Supervisor', 'salary' => '₹32,000', 'status' => 'Pending'],
            ]
        ];

        return view('cuns_manager.finance.payroll', compact('payroll_data'));
    }

    public function financeReports()
    {
        $financial_reports = [
            'total_revenue' => '₹8,50,00,000',
            'total_expenses' => '₹6,20,00,000',
            'net_profit' => '₹2,30,00,000',
            'profit_margin' => 27.1,
            'monthly_data' => [
                ['month' => 'Jan', 'revenue' => '₹70,00,000', 'expenses' => '₹50,00,000'],
                ['month' => 'Feb', 'revenue' => '₹75,00,000', 'expenses' => '₹55,00,000'],
                ['month' => 'Mar', 'revenue' => '₹80,00,000', 'expenses' => '₹58,00,000'],
            ]
        ];

        return view('cuns_manager.finance.reports', compact('financial_reports'));
    }

    /**
     * ✅ TASK MANAGEMENT FUNCTIONS
     */
    public function tasksIndex()
    {
        $tasks = [
            [
                'id' => 1,
                'title' => 'Foundation Work',
                'project' => 'Office Building',
                'assigned_to' => 'Rahul Sharma',
                'priority' => 'High',
                'status' => 'In Progress',
                'due_date' => '2024-03-25'
            ],
            [
                'id' => 2,
                'title' => 'Safety Inspection',
                'project' => 'Residential Complex',
                'assigned_to' => 'Priya Singh',
                'priority' => 'Medium',
                'status' => 'Completed',
                'due_date' => '2024-03-20'
            ]
        ];

        return view('cuns_manager.tasks.index', compact('tasks'));
    }

    public function tasksCreate()
    {
        return view('cuns_manager.tasks.assign');
    }

    public function tasksProgress()
    {
        $progress_data = [
            'total_tasks' => 156,
            'completed' => 120,
            'in_progress' => 25,
            'pending' => 11,
            'completion_rate' => 76.9,
            'recent_tasks' => [
                ['task' => 'Electrical Wiring', 'progress' => 80, 'status' => 'In Progress'],
                ['task' => 'Plumbing Work', 'progress' => 60, 'status' => 'In Progress'],
                ['task' => 'Painting', 'progress' => 30, 'status' => 'Pending'],
            ]
        ];

        return view('cuns_manager.tasks.progress', compact('progress_data'));
    }

    /**
     * 📊 REPORTS FUNCTIONS
     */
    public function reportsDaily()
    {
        $daily_report = [
            'date' => '2024-03-21',
            'site_activities' => [
                'foundation_work' => 'Completed for Block A',
                'material_delivery' => 'Cement and Steel received',
                'safety_checks' => 'All safety protocols followed',
                'issues' => 'No major issues reported'
            ],
            'attendance' => '42/45 present',
            'weather' => 'Clear, 28°C'
        ];

        return view('cuns_manager.reports.daily', compact('daily_report'));
    }

    public function reportsAttendance()
    {
        $attendance_report = [
            'month' => 'March 2024',
            'total_days' => 21,
            'average_attendance' => 93.2,
            'department_wise' => [
                ['department' => 'Engineering', 'attendance' => 95.5],
                ['department' => 'Safety', 'attendance' => 92.8],
                ['department' => 'Labor', 'attendance' => 91.0],
            ]
        ];

        return view('cuns_manager.reports.attendance', compact('attendance_report'));
    }

    public function reportsFinancial()
    {
        $financial_report = [
            'period' => 'Q1 2024',
            'total_revenue' => '₹2,45,00,000',
            'total_expenses' => '₹1,85,00,000',
            'net_profit' => '₹60,00,000',
            'project_wise' => [
                ['project' => 'Office Building', 'revenue' => '₹1,20,00,000', 'expenses' => '₹90,00,000'],
                ['project' => 'Residential Complex', 'revenue' => '₹95,00,000', 'expenses' => '₹75,00,000'],
                ['project' => 'Shopping Mall', 'revenue' => '₹30,00,000', 'expenses' => '₹20,00,000'],
            ]
        ];

        return view('cuns_manager.reports.financial', compact('financial_report'));
    }

    public function reportsPerformance()
    {
        $performance_report = [
            'period' => 'March 2024',
            'overall_performance' => 88.5,
            'department_performance' => [
                ['department' => 'Engineering', 'score' => 92.0],
                ['department' => 'Safety', 'score' => 89.5],
                ['department' => 'Supervision', 'score' => 86.0],
                ['department' => 'Labor', 'score' => 84.5],
            ],
            'top_performers' => [
                ['name' => 'Rahul Sharma', 'department' => 'Engineering', 'score' => 96.0],
                ['name' => 'Priya Singh', 'department' => 'Safety', 'score' => 94.5],
            ]
        ];

        return view('cuns_manager.reports.performance', compact('performance_report'));
    }

    /**
     * 🎯 QUALITY & SAFETY FUNCTIONS
     */
    public function qualityInspections()
    {
        $inspections = [
            [
                'id' => 1,
                'project' => 'Office Building',
                'inspection_type' => 'Structural',
                'inspector' => 'Quality Team',
                'date' => '2024-03-20',
                'status' => 'Passed',
                'remarks' => 'All parameters within limits'
            ],
            [
                'id' => 2,
                'project' => 'Residential Complex',
                'inspection_type' => 'Safety',
                'inspector' => 'Safety Officer',
                'date' => '2024-03-19',
                'status' => 'Failed',
                'remarks' => 'Safety gear not properly used'
            ]
        ];

        return view('cuns_manager.quality.inspections', compact('inspections'));
    }

    public function qualitySafetyReports()
    {
        $safety_reports = [
            'total_incidents' => 2,
            'incidents_this_month' => 0,
            'safety_score' => 94.5,
            'recent_incidents' => [
                ['date' => '2024-02-15', 'type' => 'Minor Injury', 'severity' => 'Low', 'action_taken' => 'First Aid provided'],
                ['date' => '2024-01-20', 'type' => 'Equipment Malfunction', 'severity' => 'Medium', 'action_taken' => 'Equipment replaced'],
            ]
        ];

        return view('cuns_manager.quality.safety', compact('safety_reports'));
    }

    /**
     * 📢 COMMUNICATION FUNCTIONS
     */
    public function communicationIndex()
    {
        $messages = [
            [
                'from' => 'Site Supervisor',
                'message' => 'Foundation work completed for Block A',
                'time' => '2 hours ago',
                'priority' => 'Normal'
            ],
            [
                'from' => 'Safety Officer',
                'message' => 'Monthly safety meeting scheduled',
                'time' => '5 hours ago',
                'priority' => 'Important'
            ]
        ];

        return view('cuns_manager.communication.index', compact('messages'));
    }

    public function communicationAnnouncement()
    {
        $announcements = [
            [
                'title' => 'Holiday Announcement',
                'content' => 'Site will be closed on 25th March for Holi festival',
                'date' => '2024-03-20',
                'posted_by' => 'Project Manager'
            ],
            [
                'title' => 'Safety Training',
                'content' => 'Mandatory safety training on 28th March for all staff',
                'date' => '2024-03-18',
                'posted_by' => 'Safety Department'
            ]
        ];

        return view('cuns_manager.communication.announcement', compact('announcements'));
    }

    /**
     * 🔔 NOTIFICATIONS FUNCTION
     */
    public function notificationsIndex()
    {
        $notifications = [
            [
                'type' => 'Task Reminder',
                'message' => 'Foundation inspection due tomorrow',
                'time' => '1 hour ago',
                'read' => false
            ],
            [
                'type' => 'Material Alert',
                'message' => 'Cement stock running low',
                'time' => '3 hours ago',
                'read' => true
            ],
            [
                'type' => 'Attendance',
                'message' => '3 employees absent today',
                'time' => '5 hours ago',
                'read' => true
            ]
        ];

        return view('cuns_manager.notifications.index', compact('notifications'));
    }
}