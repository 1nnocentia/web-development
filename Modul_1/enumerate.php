<?php
    // Declaration
    enum InvoiceStatus
    {
        case Sent;
        case Paid;
        case Cancelled;
    }

    // The enum can then be use as a type
    function printInvoiceStatus(InvoiceStatus $status)
    {
        print($status->name);
    }

    printInvoiceStatus(InvoiceStatus::Sent);
    // Sent
    echo "\n";
    // enum with return value and public function exemple
    enum InvoiceStatusWithValue : int
    {
        case Sent = 0;
        case Paid = 1;
        case Cancelled = 2;

        public function text() : string
        {
            return match ($this) {
                self::Sent => 'Sent',
                self::Paid => 'Paid',
                self::Cancelled => 'Cancelled'
            };
        }
    }

    function getInvoiceStatus(InvoiceStatusWithValue $status)
    {
        print($status->text());
        print($status->value);
    }

    getInvoiceStatus(InvoiceStatusWithValue::Paid);
    // Paid1
?>