<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taxes = [
            [
                'tax_code' => 'WO',
                'tax_type' => 'Capital Gains Tax',
                'tax_rate' => '2',
                'tax_fixed' => false,
                'tax_description' => 'Capital Gains Tax is a tax imposed on the gains presumed to have been realized by the seller from the sale, exchange, or other disposition of capital assets located in the Philippines, including pacto de retro sales and other forms of conditional sale. ',
            ],
            [
                'tax_code' => 'DS',
                'tax_type' => 'Documentary Stamp Tax',
                'tax_rate' => '2',
                'tax_fixed' => false,
                'tax_description' => 'Documentary Stamp Tax is a tax on documents, instruments, loan agreements and papers evidencing the acceptance, assignment, sale or transfer of an obligation, rights, or property incident thereto. ',
            ],
            [
                'tax_code' => 'DN',
                'tax_type' => 'Donor\'s Tax',
                'tax_rate' => '2',
                'tax_fixed' => false,
                'tax_description' => 'Donor\'s Tax is a tax on a donation or gift, and is imposed on the gratuitous transfer of property between two or more persons who are living at the time of the transfer. ',
            ],
            [
                'tax_code' => 'ES',
                'tax_type' => 'Estate Tax',
                'tax_rate' => '2',
                'tax_fixed' => false,
                'tax_description' => 'Estate Tax is a tax on the right of the deceased person to transmit his/her estate to his/her lawful heirs and beneficiaries at the time of death and on certain transfers which are made by law as equivalent to testamentary disposition. ',
            ],
            [
                'tax_code' => 'IT',
                'tax_type' => 'Income Tax',
                'tax_rate' => '2',
                'tax_fixed' => false,
                'tax_description' => 'Income Tax is a tax on all yearly profits arising from property, profession, trades or offices or as a tax on a person’s income, emoluments, profits and the like.',
            ],
            [
                'tax_code' => 'PT',
                'tax_type' => 'Percentage Tax',
                'tax_rate' => '2',
                'tax_fixed' => false,
                'tax_description' => 'Percentage Tax is a business tax imposed on persons or entities who sell or lease goods, properties or services in the course of trade or business whose gross annual sales or receipts do not exceed P550,000 and are not VAT-registered. ',
            ],
            [
                'tax_code' => 'VT',
                'tax_type' => 'Value-Added Tax',
                'tax_rate' => '2',
                'tax_fixed' => false,
                'tax_description' => 'Value-Added Tax is a business tax imposed and collected from the seller in the course of trade or business on every sale of properties (real or personal) lease of goods or properties (real or personal) or vendors of services. It is an indirect tax, thus, it can be passed on to the buyer. ',
            ],
            [
                'tax_code' => 'WC',
                'tax_type' => 'Withholding Tax',
                'tax_rate' => '2',
                'tax_fixed' => false,
                'tax_description' => 'Withholding Tax on Compensation is the tax withheld from individuals receiving purely compensation income. ',
            ],
            [
                'tax_code' => 'EV',
                'tax_type' => 'Excise-Ad Valorem',
                'tax_rate' => '2',
                'tax_fixed' => false,
                'tax_description' => 'Ad Valorem Tax refers to the excise tax which is based on selling price or other specified value of the goods/articles',
            ],
            [
                'tax_code' => 'XS',
                'tax_type' => 'Excise – Specific',
                'tax_rate' => '2',
                'tax_fixed' => false,
                'tax_description' => 'Specific Tax refers to the excise tax imposed which is based on weight or volume capacity or any other physical unit of measurement',
            ],
        ];

        foreach ($taxes as $tax) {
            Tax::create($tax);
        }
    }
}
