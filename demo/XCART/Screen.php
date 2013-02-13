<?php
class ProcessResult {
  public $Status; // ProcessStatus
  public $Seconds; // int
  public $Message; // string
}

class ProcessStatus {
  const NotExists = 'NotExists';
  const InProcess = 'InProcess';
  const Completed = 'Completed';
  const Aborted = 'Aborted';
}

class GetScenario {
  public $scenario; // string
}

class GetScenarioResponse {
  public $GetScenarioResult; // ArrayOfCommand
}

class Command {
  public $FieldName; // string
  public $ObjectName; // string
  public $Value; // string
  public $Commit; // boolean
  public $IgnoreError; // boolean
  public $LinkedCommand; // Command
  public $Descriptor; // ElementDescriptor
  //Workaround for PHP BUG 50675
  function __clone(){
    foreach($this as $name => $value){
        if(gettype($value)=='object'){
            $this->$name= clone($this->$name);
        }
    }
  }
}

class ElementDescriptor {
  public $DisplayName; // string
  public $IsDisabled; // boolean
  public $IsRequired; // boolean
  public $ElementType; // ElementTypes
  public $LengthLimit; // int
  public $InputMask; // string
  public $DisplayRules; // string
  public $AllowedValues; // ArrayOfString
}

class ElementTypes {
  const String = 'String';
  const AsciiString = 'AsciiString';
  const StringSelector = 'StringSelector';
  const ExplicitSelector = 'ExplicitSelector';
  const Number = 'Number';
  const Option = 'Option';
  const WideOption = 'WideOption';
  const Calendar = 'Calendar';
  const Action = 'Action';
}

class SchemaMode {
  const Basic = 'Basic';
  const Detailed = 'Detailed';
}

class EveryValue extends Command {
}

class Key extends Command {
}

class Action extends Command {
}

class Field extends Command {
}

class Value extends Command {
  public $Message; // string
  public $IsError; // boolean
}

class Answer extends Command {
}

class RowNumber extends Command {
}

class NewRow extends Command {
}

class DeleteRow {
}

class Parameter extends Command {
}

class Attachment {
}

class Filter {
  public $Field; // Field
  public $Condition; // FilterCondition
  public $Value; // anyType
  public $Value2; // anyType
  public $OpenBrackets; // int
  public $CloseBrackets; // int
  public $Operator; // FilterOperator
}

class FilterCondition {
  const Equals = 'Equals';
  const NotEqual = 'NotEqual';
  const Greater = 'Greater';
  const GreaterOrEqual = 'GreaterOrEqual';
  const Less = 'Less';
  const LessOrEqual = 'LessOrEqual';
  const Contain = 'Contain';
  const StartsWith = 'StartsWith';
  const EndsWith = 'EndsWith';
  const NotContain = 'NotContain';
  const Between = 'Between';
  const IsNull = 'IsNull';
  const IsNotNull = 'IsNotNull';
}

class FilterOperator {
  const _And = 'And';
  const _Or = 'Or';
}

class Login {
  public $name; // string
  public $password; // string
}

class LoginResult {
  public $Code; // ErrorCode
  public $Message; // string
  public $Session; // string
}

class ErrorCode {
  const OK = 'OK';
  const INVALID_CREDENTIALS = 'INVALID_CREDENTIALS';
  const INTERNAL_ERROR = 'INTERNAL_ERROR';
  const INVALID_API_VERSION = 'INVALID_API_VERSION';
}

class LoginResponse {
  public $LoginResult; // LoginResult
}

class SetBusinessDate {
  public $date; // dateTime
}

class SetBusinessDateResponse {
}

class SetLocaleName {
  public $localeName; // string
}

class SetLocaleNameResponse {
}

class SetSchemaMode {
  public $mode; // SchemaMode
}

class SetSchemaModeResponse {
}

class IN202500Content {
  public $Actions; // IN202500Actions
  public $StockItemSummary; // IN202500StockItemSummary
  public $DeferredRevenueRules; // IN202500DeferredRevenueRules
  public $GeneralSettingsItemDefaults; // IN202500GeneralSettingsItemDefaults
  public $GeneralSettingsStorageDefaults; // IN202500GeneralSettingsStorageDefaults
  public $GeneralSettingsLotSerialSettings; // IN202500GeneralSettingsLotSerialSettings
  public $GeneralSettingsConversionsBaseUnit; // IN202500GeneralSettingsConversionsBaseUnit
  public $PriceCostInfoStandardCost; // IN202500PriceCostInfoStandardCost
  public $PriceCostInfoBasePrice; // IN202500PriceCostInfoBasePrice
  public $Attributes; // IN202500Attributes
  public $PackagingDimensions; // IN202500PackagingDimensions
  public $PackagingPhysicalInventory; // IN202500PackagingPhysicalInventory
  public $GLAccounts; // IN202500GLAccounts
  public $GeneralSettings; // IN202500GeneralSettings
  public $PriceCostInfoCostStatistics; // IN202500PriceCostInfoCostStatistics
  public $GeneralSettingsConversions; // IN202500GeneralSettingsConversions
  public $WarehouseDetails; // IN202500WarehouseDetails
  public $CrossReference; // IN202500CrossReference
  public $DeferredRevenueRevenueComponents; // IN202500DeferredRevenueRevenueComponents
  public $ReplenishmentInfoReplenishmentSettings; // IN202500ReplenishmentInfoReplenishmentSettings
  public $ReplenishmentInfoSubitemReplenishmentSettings; // IN202500ReplenishmentInfoSubitemReplenishmentSettings
  public $VendorDetails; // IN202500VendorDetails
  public $AttributesSalesCategories; // IN202500AttributesSalesCategories
  public $PackagingBoxes; // IN202500PackagingBoxes
  public $AttributesAttributes; // IN202500AttributesAttributes
  public $RestrictionGroups; // IN202500RestrictionGroups
}

class IN202500Actions {
  public $UpdateVendorPrice; // Action
  public $Save; // Action
  public $Cancel; // Action
  public $Insert; // Action
  public $Edit; // Action
  public $Delete; // Action
  public $First; // Action
  public $Prev; // Action
  public $Next; // Action
  public $Last; // Action
  public $Action; // Action
  public $ActionUpdatePrice; // Action
  public $ActionUpdateCost; // Action
  public $ActionViewRestrictionGroups; // Action
  public $Inquiry; // Action
  public $InquirySummary; // Action
  public $InquiryAllocationDetails; // Action
  public $InquiryTransactionSummary; // Action
  public $InquiryTransactionDetails; // Action
  public $InquiryTransactionHistory; // Action
  public $AddWarehouseDetail; // Action
  public $UpdateReplenishment; // Action
  public $GenerateSubitems; // Action
  public $GenerateLotSerialNumber; // Action
}

class IN202500StockItemSummary {
  public $InventoryID; // Field
  public $Description; // Field
  public $ItemStatus; // Field
  public $ProductWorkgroup; // Field
  public $ProductManager; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500StockItemSummaryServiceCommands
}

class IN202500StockItemSummaryServiceCommands {
  public $KeyInventoryID; // Key
  public $EveryInventoryID; // EveryValue
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500DeferredRevenueRules {
  public $DeferralCode; // Field
  public $UseComponentSubaccounts; // Field
  public $TotalPercentage; // Field
  public $SplitIntoComponents; // Field
  public $ServiceCommands; // IN202500DeferredRevenueRulesServiceCommands
}

class IN202500DeferredRevenueRulesServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500GeneralSettingsItemDefaults {
  public $ItemClass; // Field
  public $Type; // Field
  public $ValuationMethod; // Field
  public $PostingClass; // Field
  public $PICycle; // Field
  public $IsAKit; // Field
  public $PriceClass; // Field
  public $SubjectToCommission; // Field
  public $TaxCategory; // Field
  public $ServiceCommands; // IN202500GeneralSettingsItemDefaultsServiceCommands
}

class IN202500GeneralSettingsItemDefaultsServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500GeneralSettingsStorageDefaults {
  public $DefaultWarehouse; // Field
  public $DefaultIssueFrom; // Field
  public $DefaultReceiptTo; // Field
  public $DefaultSubitem; // Field
  public $UseOnEntry; // Field
  public $ServiceCommands; // IN202500GeneralSettingsStorageDefaultsServiceCommands
}

class IN202500GeneralSettingsStorageDefaultsServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500GeneralSettingsLotSerialSettings {
  public $LotSerialClass; // Field
  public $AutoIncrementalSegmentValue; // Field
  public $ServiceCommands; // IN202500GeneralSettingsLotSerialSettingsServiceCommands
}

class IN202500GeneralSettingsLotSerialSettingsServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500GeneralSettingsConversionsBaseUnit {
  public $BaseUnit; // Field
  public $SalesUnit; // Field
  public $PurchaseUnit; // Field
  public $ServiceCommands; // IN202500GeneralSettingsConversionsBaseUnitServiceCommands
}

class IN202500GeneralSettingsConversionsBaseUnitServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500PriceCostInfoStandardCost {
  public $LastCost; // Field
  public $CurrentCost; // Field
  public $EffectiveDate; // Field
  public $PendingCost; // Field
  public $PendingCostDate; // Field
  public $ServiceCommands; // IN202500PriceCostInfoStandardCostServiceCommands
}

class IN202500PriceCostInfoStandardCostServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500PriceCostInfoBasePrice {
  public $LastPrice; // Field
  public $CurrentPrice; // Field
  public $EffectiveDate; // Field
  public $PendingPrice; // Field
  public $PendingPriceDate; // Field
  public $PriceWorkgroup; // Field
  public $PriceManager; // Field
  public $MinMarkup; // Field
  public $Markup; // Field
  public $MSRP; // Field
  public $ServiceCommands; // IN202500PriceCostInfoBasePriceServiceCommands
}

class IN202500PriceCostInfoBasePriceServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500Attributes {
  public $ImageUrl; // Field
  public $ServiceCommands; // IN202500AttributesServiceCommands
}

class IN202500AttributesServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500PackagingDimensions {
  public $Weight; // Field
  public $WeightUOM; // Field
  public $Volume; // Field
  public $VolumeUOM; // Field
  public $PackagingOption; // Field
  public $ServiceCommands; // IN202500PackagingDimensionsServiceCommands
}

class IN202500PackagingDimensionsServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500PackagingPhysicalInventory {
  public $ABCCode; // Field
  public $FixedABCCode; // Field
  public $MovementClass; // Field
  public $FixedMovementClass; // Field
  public $ServiceCommands; // IN202500PackagingPhysicalInventoryServiceCommands
}

class IN202500PackagingPhysicalInventoryServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500GLAccounts {
  public $InventoryAccount; // Field
  public $InventorySub; // Field
  public $ReasonCodeSub; // Field
  public $SalesAccount; // Field
  public $SalesSub; // Field
  public $COGSAccount; // Field
  public $COGSSub; // Field
  public $StandardCostVarianceAccount; // Field
  public $StandardCostVarianceSub; // Field
  public $StandardCostRevaluationAccount; // Field
  public $StandardCostRevaluationSub; // Field
  public $POAccrualAccount; // Field
  public $POAccrualSub; // Field
  public $PurchasePriceVarianceAccount; // Field
  public $PurchasePriceVarianceSub; // Field
  public $DiscountAccount; // Field
  public $DiscountSub; // Field
  public $LandedCostVarianceAccount; // Field
  public $LandedCostVarianceSub; // Field
  public $ServiceCommands; // IN202500GLAccountsServiceCommands
}

class IN202500GLAccountsServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500GeneralSettings {
  public $ServiceCommands; // IN202500GeneralSettingsServiceCommands
}

class IN202500GeneralSettingsServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500PriceCostInfoCostStatistics {
  public $LastCost; // Field
  public $AverageCost; // Field
  public $MinCost; // Field
  public $MaxCost; // Field
  public $ServiceCommands; // IN202500PriceCostInfoCostStatisticsServiceCommands
}

class IN202500PriceCostInfoCostStatisticsServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN202500GeneralSettingsConversions {
  public $FromUnit; // Field
  public $MultiplyDivide; // Field
  public $ConversionFactor; // Field
  public $ToUnitSampleToUnit; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500GeneralSettingsConversionsServiceCommands
}

class IN202500GeneralSettingsConversionsServiceCommands {
  public $KeyFromUnit; // Key
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN202500WarehouseDetails {
  public $Default; // Field
  public $Warehouse; // Field
  public $WarehouseWarehouseID; // Field
  public $DefaultReceiptTo; // Field
  public $DefaultIssueFrom; // Field
  public $Status; // Field
  public $InventoryAccount; // Field
  public $InventorySub; // Field
  public $ProductWorkgroup; // Field
  public $ProductManager; // Field
  public $OverrideStdCost; // Field
  public $PriceOverride; // Field
  public $QtyOnHand; // Field
  public $OverridePreferredVendor; // Field
  public $PreferredVendor; // Field
  public $OverrideReplenishmentSettings; // Field
  public $Seasonality; // Field
  public $ReplenishmentSource; // Field
  public $ReplenishmentWarehouse; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500WarehouseDetailsServiceCommands
}

class IN202500WarehouseDetailsServiceCommands {
  public $KeyWarehouse; // Key
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN202500CrossReference {
  public $AlternateType; // Field
  public $VendorCustomer; // Field
  public $AlternateID; // Field
  public $Description; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500CrossReferenceServiceCommands
}

class IN202500CrossReferenceServiceCommands {
  public $KeyAlternateType; // Key
  public $KeyVendorCustomer; // Key
  public $KeyAlternateID; // Key
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN202500DeferredRevenueRevenueComponents {
  public $InventoryID; // Field
  public $SalesAccount; // Field
  public $SalesSub; // Field
  public $UOM; // Field
  public $Quantity; // Field
  public $DeferralCode; // Field
  public $AmountOption; // Field
  public $FixedAmount; // Field
  public $Percentage; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500DeferredRevenueRevenueComponentsServiceCommands
}

class IN202500DeferredRevenueRevenueComponentsServiceCommands {
  public $KeyInventoryID; // Key
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN202500ReplenishmentInfoReplenishmentSettings {
  public $InventoryID; // Field
  public $ClassID; // Field
  public $Seasonality; // Field
  public $Method; // Field
  public $Source; // Field
  public $ReplenishmentWarehouse; // Field
  public $MaxShelfLifeDays; // Field
  public $LaunchDate; // Field
  public $TerminationDate; // Field
  public $SafetyStock; // Field
  public $ReorderPoint; // Field
  public $MaxQty; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500ReplenishmentInfoReplenishmentSettingsServiceCommands
}

class IN202500ReplenishmentInfoReplenishmentSettingsServiceCommands {
  public $KeyClassID; // Key
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN202500ReplenishmentInfoSubitemReplenishmentSettings {
  public $InventoryID; // Field
  public $ReplenishmentClassID; // Field
  public $SafetyStock; // Field
  public $ReorderPoint; // Field
  public $MaxQty; // Field
  public $Status; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500ReplenishmentInfoSubitemReplenishmentSettingsServiceCommands
}

class IN202500ReplenishmentInfoSubitemReplenishmentSettingsServiceCommands {
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN202500VendorDetails {
  public $Active; // Field
  public $Default; // Field
  public $VendorID; // Field
  public $VendorName; // Field
  public $Location; // Field
  public $Warehouse; // Field
  public $PurchaseUnit; // Field
  public $VendorInventoryID; // Field
  public $LeadTimeDays; // Field
  public $Override; // Field
  public $AddLeadTimeDays; // Field
  public $MinOrderFreqDays; // Field
  public $MinOrderQty; // Field
  public $MaxOrderQty; // Field
  public $LotSize; // Field
  public $EOQ; // Field
  public $CurrencyID; // Field
  public $PendingVendorPrice; // Field
  public $PendingEffDate; // Field
  public $EffVendorPrice; // Field
  public $EffDate; // Field
  public $LastVendorPrice; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500VendorDetailsServiceCommands
}

class IN202500VendorDetailsServiceCommands {
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN202500AttributesSalesCategories {
  public $CategoryID; // Field
  public $Description; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500AttributesSalesCategoriesServiceCommands
}

class IN202500AttributesSalesCategoriesServiceCommands {
  public $KeyCategoryID; // Key
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN202500PackagingBoxes {
  public $BoxID; // Field
  public $UOM; // Field
  public $Qty; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500PackagingBoxesServiceCommands
}

class IN202500PackagingBoxesServiceCommands {
  public $KeyBoxID; // Key
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN202500AttributesAttributes {
  public $Attribute; // Field
  public $Value; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500AttributesAttributesServiceCommands
}

class IN202500AttributesAttributesServiceCommands {
  public $KeyAttribute; // Key
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN202500RestrictionGroups {
  public $Included; // Field
  public $GroupName; // Field
  public $SpecificType; // Field
  public $Description; // Field
  public $Active; // Field
  public $GroupType; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN202500RestrictionGroupsServiceCommands
}

class IN202500RestrictionGroupsServiceCommands {
  public $KeyGroupName; // Key
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN202500PrimaryKey {
  public $InventoryID; // Value
}

class IN202500Clear {
}

class IN202500ClearResponse {
}

class IN202500GetProcessStatus {
}

class IN202500GetProcessStatusResponse {
  public $GetProcessStatusResult; // ProcessResult
}

class IN202500GetSchema {
}

class IN202500GetSchemaResponse {
  public $GetSchemaResult; // IN202500Content
}

class IN202500SetSchema {
  public $schema; // IN202500Content
}

class IN202500SetSchemaResponse {
}

class IN202500Export {
  public $commands; // ArrayOfCommand
  public $filters; // ArrayOfFilter
  public $topCount; // int
  public $includeHeaders; // boolean
  public $breakOnError; // boolean
}

class IN202500ExportResponse {
  public $ExportResult; // ArrayOfArrayOfString
}

class IN202500Import {
  public $commands; // ArrayOfCommand
  public $filters; // ArrayOfFilter
  public $data; // ArrayOfArrayOfString
  public $includedHeaders; // boolean
  public $breakOnError; // boolean
  public $breakOnIncorrectTarget; // boolean
}

class IN202500ImportResponse {
  public $ImportResult; // IN202500ArrayOfImportResult
}

class IN202500ImportResult {
  public $Processed; // boolean
  public $Error; // string
  public $Keys; // IN202500PrimaryKey
}

class IN202500ArrayOfImportResult {
  public $ImportResult; // IN202500ImportResult
}

class IN202500Submit {
  public $commands; // ArrayOfCommand
}

class IN202500ArrayOfContent {
  public $Content; // IN202500Content
}

class IN202500SubmitResponse {
  public $SubmitResult; // IN202500ArrayOfContent
}

class IN302000Content {
  public $Actions; // IN302000Actions
  public $DocumentSummary; // IN302000DocumentSummary
  public $FinancialDetails; // IN302000FinancialDetails
  public $TransactionDetails; // IN302000TransactionDetails
  public $BinLotSerialNumbers; // IN302000BinLotSerialNumbers
  public $InventoryLookupBarCode; // IN302000InventoryLookupBarCode
  public $InventoryLookup; // IN302000InventoryLookup
  public $BinLotSerialNumbersUnassignedQty; // IN302000BinLotSerialNumbersUnassignedQty
}

class IN302000Actions {
  public $Save; // Action
  public $Cancel; // Action
  public $Insert; // Action
  public $CopyPaste; // Action
  public $Delete; // Action
  public $First; // Action
  public $Previous; // Action
  public $Next; // Action
  public $Last; // Action
  public $LSINTranGenerateLotSerial; // Action
  public $LSINTranBinLotSerial; // Action
  public $ViewBatch; // Action
  public $Release; // Action
  public $Report; // Action
  public $ReportINEdit; // Action
  public $ReportINRegisterDetails; // Action
  public $InventorySummary; // Action
  public $AddInvBySite; // Action
  public $AddInvSelBySite; // Action
}

class IN302000DocumentSummary {
  public $ReferenceNbr; // Field
  public $Hold; // Field
  public $Date; // Field
  public $PostPeriod; // Field
  public $Status; // Field
  public $Description; // Field
  public $TotalQty; // Field
  public $TotalAmount; // Field
  public $ExternalRef; // Field
  public $ControlQty; // Field
  public $ControlAmount; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN302000DocumentSummaryServiceCommands
}

class IN302000DocumentSummaryServiceCommands {
  public $KeyReferenceNbr; // Key
  public $EveryReferenceNbr; // EveryValue
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN302000FinancialDetails {
  public $Branch; // Field
  public $BatchNbr; // Field
  public $ServiceCommands; // IN302000FinancialDetailsServiceCommands
}

class IN302000FinancialDetailsServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN302000TransactionDetails {
  public $TranType; // Field
  public $InventoryID; // Field
  public $Warehouse; // Field
  public $Location; // Field
  public $Quantity; // Field
  public $UOM; // Field
  public $UnitPrice; // Field
  public $ExtPrice; // Field
  public $UnitCost; // Field
  public $ExtCost; // Field
  public $LotSerialNbr; // Field
  public $ExpirationDate; // Field
  public $ReasonCode; // Field
  public $Project; // Field
  public $ProjectTask; // Field
  public $Description; // Field
  public $SOOrderType; // Field
  public $SOOrderNbr; // Field
  public $SOShipmentNbr; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN302000TransactionDetailsServiceCommands
}

class IN302000TransactionDetailsServiceCommands {
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN302000BinLotSerialNumbers {
  public $InventoryID; // Field
  public $Location; // Field
  public $LotSerialNbr; // Field
  public $Quantity; // Field
  public $UOM; // Field
  public $ExpirationDate; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN302000BinLotSerialNumbersServiceCommands
}

class IN302000BinLotSerialNumbersServiceCommands {
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN302000InventoryLookupBarCode {
  public $BarCode; // Field
  public $ItemClassID; // Field
  public $ShowAvailableItemsOnly; // Field
  public $Subitem; // Field
  public $Warehouse; // Field
  public $Location; // Field
  public $ServiceCommands; // IN302000InventoryLookupBarCodeServiceCommands
}

class IN302000InventoryLookupBarCodeServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN302000InventoryLookup {
  public $Selected; // Field
  public $QtySelected; // Field
  public $Warehouse; // Field
  public $Location; // Field
  public $ItemCassID; // Field
  public $ItemCassDescription; // Field
  public $PriceClass; // Field
  public $PriceCassDescription; // Field
  public $InventoryID; // Field
  public $SubitemID; // Field
  public $Description; // Field
  public $BaseUnit; // Field
  public $QtyAvailable; // Field
  public $QtyOnHand; // Field
  public $NoteText; // Field
  public $ServiceCommands; // IN302000InventoryLookupServiceCommands
}

class IN302000InventoryLookupServiceCommands {
  public $NewRow; // NewRow
  public $RowNumber; // RowNumber
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
}

class IN302000BinLotSerialNumbersUnassignedQty {
  public $UnassignedQty; // Field
  public $QuantityToGenerate; // Field
  public $StartLotSerialNumber; // Field
  public $ServiceCommands; // IN302000BinLotSerialNumbersUnassignedQtyServiceCommands
}

class IN302000BinLotSerialNumbersUnassignedQtyServiceCommands {
  public $DeleteRow; // DeleteRow
  public $DialogAnswer; // Answer
  public $Attachment; // Attachment
}

class IN302000PrimaryKey {
  public $ReferenceNbr; // Value
}

class IN302000Clear {
}

class IN302000ClearResponse {
}

class IN302000GetProcessStatus {
}

class IN302000GetProcessStatusResponse {
  public $GetProcessStatusResult; // ProcessResult
}

class IN302000GetSchema {
}

class IN302000GetSchemaResponse {
  public $GetSchemaResult; // IN302000Content
}

class IN302000SetSchema {
  public $schema; // IN302000Content
}

class IN302000SetSchemaResponse {
}

class IN302000Export {
  public $commands; // ArrayOfCommand
  public $filters; // ArrayOfFilter
  public $topCount; // int
  public $includeHeaders; // boolean
  public $breakOnError; // boolean
}

class IN302000ExportResponse {
  public $ExportResult; // ArrayOfArrayOfString
}

class IN302000Import {
  public $commands; // ArrayOfCommand
  public $filters; // ArrayOfFilter
  public $data; // ArrayOfArrayOfString
  public $includedHeaders; // boolean
  public $breakOnError; // boolean
  public $breakOnIncorrectTarget; // boolean
}

class IN302000ImportResponse {
  public $ImportResult; // IN302000ArrayOfImportResult
}

class IN302000ImportResult {
  public $Processed; // boolean
  public $Error; // string
  public $Keys; // IN302000PrimaryKey
}

class IN302000ArrayOfImportResult {
  public $ImportResult; // IN302000ImportResult
}

class IN302000Submit {
  public $commands; // ArrayOfCommand
}

class IN302000ArrayOfContent {
  public $Content; // IN302000Content
}

class IN302000SubmitResponse {
  public $SubmitResult; // IN302000ArrayOfContent
}


/**
 * Screen class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class Screen extends SoapClient {

  private static $classmap = array(
                                    'ProcessResult' => 'ProcessResult',
                                    'ProcessStatus' => 'ProcessStatus',
                                    'GetScenario' => 'GetScenario',
                                    'GetScenarioResponse' => 'GetScenarioResponse',
                                    'Command' => 'Command',
                                    'ElementDescriptor' => 'ElementDescriptor',
                                    'ElementTypes' => 'ElementTypes',
                                    'SchemaMode' => 'SchemaMode',
                                    'EveryValue' => 'EveryValue',
                                    'Key' => 'Key',
                                    'Action' => 'Action',
                                    'Field' => 'Field',
                                    'Value' => 'Value',
                                    'Answer' => 'Answer',
                                    'RowNumber' => 'RowNumber',
                                    'NewRow' => 'NewRow',
                                    'DeleteRow' => 'DeleteRow',
                                    'Parameter' => 'Parameter',
                                    'Attachment' => 'Attachment',
                                    'Filter' => 'Filter',
                                    'FilterCondition' => 'FilterCondition',
                                    'FilterOperator' => 'FilterOperator',
                                    'Login' => 'Login',
                                    'LoginResult' => 'LoginResult',
                                    'ErrorCode' => 'ErrorCode',
                                    'LoginResponse' => 'LoginResponse',
                                    'SetBusinessDate' => 'SetBusinessDate',
                                    'SetBusinessDateResponse' => 'SetBusinessDateResponse',
                                    'SetLocaleName' => 'SetLocaleName',
                                    'SetLocaleNameResponse' => 'SetLocaleNameResponse',
                                    'SetSchemaMode' => 'SetSchemaMode',
                                    'SetSchemaModeResponse' => 'SetSchemaModeResponse',
                                    'IN202500Content' => 'IN202500Content',
                                    'IN202500Actions' => 'IN202500Actions',
                                    'IN202500StockItemSummary' => 'IN202500StockItemSummary',
                                    'IN202500StockItemSummaryServiceCommands' => 'IN202500StockItemSummaryServiceCommands',
                                    'IN202500DeferredRevenueRules' => 'IN202500DeferredRevenueRules',
                                    'IN202500DeferredRevenueRulesServiceCommands' => 'IN202500DeferredRevenueRulesServiceCommands',
                                    'IN202500GeneralSettingsItemDefaults' => 'IN202500GeneralSettingsItemDefaults',
                                    'IN202500GeneralSettingsItemDefaultsServiceCommands' => 'IN202500GeneralSettingsItemDefaultsServiceCommands',
                                    'IN202500GeneralSettingsStorageDefaults' => 'IN202500GeneralSettingsStorageDefaults',
                                    'IN202500GeneralSettingsStorageDefaultsServiceCommands' => 'IN202500GeneralSettingsStorageDefaultsServiceCommands',
                                    'IN202500GeneralSettingsLotSerialSettings' => 'IN202500GeneralSettingsLotSerialSettings',
                                    'IN202500GeneralSettingsLotSerialSettingsServiceCommands' => 'IN202500GeneralSettingsLotSerialSettingsServiceCommands',
                                    'IN202500GeneralSettingsConversionsBaseUnit' => 'IN202500GeneralSettingsConversionsBaseUnit',
                                    'IN202500GeneralSettingsConversionsBaseUnitServiceCommands' => 'IN202500GeneralSettingsConversionsBaseUnitServiceCommands',
                                    'IN202500PriceCostInfoStandardCost' => 'IN202500PriceCostInfoStandardCost',
                                    'IN202500PriceCostInfoStandardCostServiceCommands' => 'IN202500PriceCostInfoStandardCostServiceCommands',
                                    'IN202500PriceCostInfoBasePrice' => 'IN202500PriceCostInfoBasePrice',
                                    'IN202500PriceCostInfoBasePriceServiceCommands' => 'IN202500PriceCostInfoBasePriceServiceCommands',
                                    'IN202500Attributes' => 'IN202500Attributes',
                                    'IN202500AttributesServiceCommands' => 'IN202500AttributesServiceCommands',
                                    'IN202500PackagingDimensions' => 'IN202500PackagingDimensions',
                                    'IN202500PackagingDimensionsServiceCommands' => 'IN202500PackagingDimensionsServiceCommands',
                                    'IN202500PackagingPhysicalInventory' => 'IN202500PackagingPhysicalInventory',
                                    'IN202500PackagingPhysicalInventoryServiceCommands' => 'IN202500PackagingPhysicalInventoryServiceCommands',
                                    'IN202500GLAccounts' => 'IN202500GLAccounts',
                                    'IN202500GLAccountsServiceCommands' => 'IN202500GLAccountsServiceCommands',
                                    'IN202500GeneralSettings' => 'IN202500GeneralSettings',
                                    'IN202500GeneralSettingsServiceCommands' => 'IN202500GeneralSettingsServiceCommands',
                                    'IN202500PriceCostInfoCostStatistics' => 'IN202500PriceCostInfoCostStatistics',
                                    'IN202500PriceCostInfoCostStatisticsServiceCommands' => 'IN202500PriceCostInfoCostStatisticsServiceCommands',
                                    'IN202500GeneralSettingsConversions' => 'IN202500GeneralSettingsConversions',
                                    'IN202500GeneralSettingsConversionsServiceCommands' => 'IN202500GeneralSettingsConversionsServiceCommands',
                                    'IN202500WarehouseDetails' => 'IN202500WarehouseDetails',
                                    'IN202500WarehouseDetailsServiceCommands' => 'IN202500WarehouseDetailsServiceCommands',
                                    'IN202500CrossReference' => 'IN202500CrossReference',
                                    'IN202500CrossReferenceServiceCommands' => 'IN202500CrossReferenceServiceCommands',
                                    'IN202500DeferredRevenueRevenueComponents' => 'IN202500DeferredRevenueRevenueComponents',
                                    'IN202500DeferredRevenueRevenueComponentsServiceCommands' => 'IN202500DeferredRevenueRevenueComponentsServiceCommands',
                                    'IN202500ReplenishmentInfoReplenishmentSettings' => 'IN202500ReplenishmentInfoReplenishmentSettings',
                                    'IN202500ReplenishmentInfoReplenishmentSettingsServiceCommands' => 'IN202500ReplenishmentInfoReplenishmentSettingsServiceCommands',
                                    'IN202500ReplenishmentInfoSubitemReplenishmentSettings' => 'IN202500ReplenishmentInfoSubitemReplenishmentSettings',
                                    'IN202500ReplenishmentInfoSubitemReplenishmentSettingsServiceCommands' => 'IN202500ReplenishmentInfoSubitemReplenishmentSettingsServiceCommands',
                                    'IN202500VendorDetails' => 'IN202500VendorDetails',
                                    'IN202500VendorDetailsServiceCommands' => 'IN202500VendorDetailsServiceCommands',
                                    'IN202500AttributesSalesCategories' => 'IN202500AttributesSalesCategories',
                                    'IN202500AttributesSalesCategoriesServiceCommands' => 'IN202500AttributesSalesCategoriesServiceCommands',
                                    'IN202500PackagingBoxes' => 'IN202500PackagingBoxes',
                                    'IN202500PackagingBoxesServiceCommands' => 'IN202500PackagingBoxesServiceCommands',
                                    'IN202500AttributesAttributes' => 'IN202500AttributesAttributes',
                                    'IN202500AttributesAttributesServiceCommands' => 'IN202500AttributesAttributesServiceCommands',
                                    'IN202500RestrictionGroups' => 'IN202500RestrictionGroups',
                                    'IN202500RestrictionGroupsServiceCommands' => 'IN202500RestrictionGroupsServiceCommands',
                                    'IN202500PrimaryKey' => 'IN202500PrimaryKey',
                                    'IN202500Clear' => 'IN202500Clear',
                                    'IN202500ClearResponse' => 'IN202500ClearResponse',
                                    'IN202500GetProcessStatus' => 'IN202500GetProcessStatus',
                                    'IN202500GetProcessStatusResponse' => 'IN202500GetProcessStatusResponse',
                                    'IN202500GetSchema' => 'IN202500GetSchema',
                                    'IN202500GetSchemaResponse' => 'IN202500GetSchemaResponse',
                                    'IN202500SetSchema' => 'IN202500SetSchema',
                                    'IN202500SetSchemaResponse' => 'IN202500SetSchemaResponse',
                                    'IN202500Export' => 'IN202500Export',
                                    'IN202500ExportResponse' => 'IN202500ExportResponse',
                                    'IN202500Import' => 'IN202500Import',
                                    'IN202500ImportResponse' => 'IN202500ImportResponse',
                                    'IN202500ImportResult' => 'IN202500ImportResult',
                                    'IN202500ArrayOfImportResult' => 'IN202500ArrayOfImportResult',
                                    'IN202500Submit' => 'IN202500Submit',
                                    'IN202500ArrayOfContent' => 'IN202500ArrayOfContent',
                                    'IN202500SubmitResponse' => 'IN202500SubmitResponse',
                                    'IN302000Content' => 'IN302000Content',
                                    'IN302000Actions' => 'IN302000Actions',
                                    'IN302000DocumentSummary' => 'IN302000DocumentSummary',
                                    'IN302000DocumentSummaryServiceCommands' => 'IN302000DocumentSummaryServiceCommands',
                                    'IN302000FinancialDetails' => 'IN302000FinancialDetails',
                                    'IN302000FinancialDetailsServiceCommands' => 'IN302000FinancialDetailsServiceCommands',
                                    'IN302000TransactionDetails' => 'IN302000TransactionDetails',
                                    'IN302000TransactionDetailsServiceCommands' => 'IN302000TransactionDetailsServiceCommands',
                                    'IN302000BinLotSerialNumbers' => 'IN302000BinLotSerialNumbers',
                                    'IN302000BinLotSerialNumbersServiceCommands' => 'IN302000BinLotSerialNumbersServiceCommands',
                                    'IN302000InventoryLookupBarCode' => 'IN302000InventoryLookupBarCode',
                                    'IN302000InventoryLookupBarCodeServiceCommands' => 'IN302000InventoryLookupBarCodeServiceCommands',
                                    'IN302000InventoryLookup' => 'IN302000InventoryLookup',
                                    'IN302000InventoryLookupServiceCommands' => 'IN302000InventoryLookupServiceCommands',
                                    'IN302000BinLotSerialNumbersUnassignedQty' => 'IN302000BinLotSerialNumbersUnassignedQty',
                                    'IN302000BinLotSerialNumbersUnassignedQtyServiceCommands' => 'IN302000BinLotSerialNumbersUnassignedQtyServiceCommands',
                                    'IN302000PrimaryKey' => 'IN302000PrimaryKey',
                                    'IN302000Clear' => 'IN302000Clear',
                                    'IN302000ClearResponse' => 'IN302000ClearResponse',
                                    'IN302000GetProcessStatus' => 'IN302000GetProcessStatus',
                                    'IN302000GetProcessStatusResponse' => 'IN302000GetProcessStatusResponse',
                                    'IN302000GetSchema' => 'IN302000GetSchema',
                                    'IN302000GetSchemaResponse' => 'IN302000GetSchemaResponse',
                                    'IN302000SetSchema' => 'IN302000SetSchema',
                                    'IN302000SetSchemaResponse' => 'IN302000SetSchemaResponse',
                                    'IN302000Export' => 'IN302000Export',
                                    'IN302000ExportResponse' => 'IN302000ExportResponse',
                                    'IN302000Import' => 'IN302000Import',
                                    'IN302000ImportResponse' => 'IN302000ImportResponse',
                                    'IN302000ImportResult' => 'IN302000ImportResult',
                                    'IN302000ArrayOfImportResult' => 'IN302000ArrayOfImportResult',
                                    'IN302000Submit' => 'IN302000Submit',
                                    'IN302000ArrayOfContent' => 'IN302000ArrayOfContent',
                                    'IN302000SubmitResponse' => 'IN302000SubmitResponse',
                                   );

  public function Screen($wsdl = "https://rufskin.acumatica.com/Soap/XCART.asmx?WSDL", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param GetScenario $parameters
   * @return GetScenarioResponse
   */
  public function GetScenario(GetScenario $parameters) {
    return $this->__soapCall('GetScenario', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param Login $parameters
   * @return LoginResponse
   */
  public function Login(Login $parameters) {
    return $this->__soapCall('Login', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param SetBusinessDate $parameters
   * @return SetBusinessDateResponse
   */
  public function SetBusinessDate(SetBusinessDate $parameters) {
    return $this->__soapCall('SetBusinessDate', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param SetLocaleName $parameters
   * @return SetLocaleNameResponse
   */
  public function SetLocaleName(SetLocaleName $parameters) {
    return $this->__soapCall('SetLocaleName', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param SetSchemaMode $parameters
   * @return SetSchemaModeResponse
   */
  public function SetSchemaMode(SetSchemaMode $parameters) {
    return $this->__soapCall('SetSchemaMode', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN202500Clear $parameters
   * @return IN202500ClearResponse
   */
  public function IN202500Clear(IN202500Clear $parameters) {
    return $this->__soapCall('IN202500Clear', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN202500GetProcessStatus $parameters
   * @return IN202500GetProcessStatusResponse
   */
  public function IN202500GetProcessStatus(IN202500GetProcessStatus $parameters) {
    return $this->__soapCall('IN202500GetProcessStatus', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN202500GetSchema $parameters
   * @return IN202500GetSchemaResponse
   */
  public function IN202500GetSchema(IN202500GetSchema $parameters) {
    return $this->__soapCall('IN202500GetSchema', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN202500SetSchema $parameters
   * @return IN202500SetSchemaResponse
   */
  public function IN202500SetSchema(IN202500SetSchema $parameters) {
    return $this->__soapCall('IN202500SetSchema', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN202500Export $parameters
   * @return IN202500ExportResponse
   */
  public function IN202500Export(IN202500Export $parameters) {
    return $this->__soapCall('IN202500Export', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN202500Import $parameters
   * @return IN202500ImportResponse
   */
  public function IN202500Import(IN202500Import $parameters) {
    return $this->__soapCall('IN202500Import', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN202500Submit $parameters
   * @return IN202500SubmitResponse
   */
  public function IN202500Submit(IN202500Submit $parameters) {
    return $this->__soapCall('IN202500Submit', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN302000Clear $parameters
   * @return IN302000ClearResponse
   */
  public function IN302000Clear(IN302000Clear $parameters) {
    return $this->__soapCall('IN302000Clear', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN302000GetProcessStatus $parameters
   * @return IN302000GetProcessStatusResponse
   */
  public function IN302000GetProcessStatus(IN302000GetProcessStatus $parameters) {
    return $this->__soapCall('IN302000GetProcessStatus', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN302000GetSchema $parameters
   * @return IN302000GetSchemaResponse
   */
  public function IN302000GetSchema(IN302000GetSchema $parameters) {
    return $this->__soapCall('IN302000GetSchema', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN302000SetSchema $parameters
   * @return IN302000SetSchemaResponse
   */
  public function IN302000SetSchema(IN302000SetSchema $parameters) {
    return $this->__soapCall('IN302000SetSchema', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN302000Export $parameters
   * @return IN302000ExportResponse
   */
  public function IN302000Export(IN302000Export $parameters) {
    return $this->__soapCall('IN302000Export', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN302000Import $parameters
   * @return IN302000ImportResponse
   */
  public function IN302000Import(IN302000Import $parameters) {
    return $this->__soapCall('IN302000Import', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param IN302000Submit $parameters
   * @return IN302000SubmitResponse
   */
  public function IN302000Submit(IN302000Submit $parameters) {
    return $this->__soapCall('IN302000Submit', array($parameters),       array(
            'uri' => 'http://www.acumatica.com/generic/',
            'soapaction' => ''
           )
      );
  }

}

?>
