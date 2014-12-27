<?php
//Include Common Files @1-39D8E682
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Index.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsMenuMenu1 extends clsMenu { //Menu1 class @2-FEAC4CDE

//Class_Initialize Event @2-7CB225F6
    function clsMenuMenu1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Menu1";
        $this->Visible = True;
        $this->controls = array();
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->ErrorBlock = "Menu Menu1";

        $this->StaticItems = array();
        $this->StaticItems[] = array("item_id" => "MenuItem1", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("Samples"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText("Samples"));
        $this->StaticItems[] = array("item_id" => "MenuItem1Item1", "item_id_parent" => "MenuItem1", "item_caption" => $CCSLocales->GetText("CCS Misc"), "item_url" => array("Page" => "ccs", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText("CCS Miscellanous"));
        $this->StaticItems[] = array("item_id" => "MenuItem1Item2", "item_id_parent" => "MenuItem1", "item_caption" => $CCSLocales->GetText("Forum"), "item_url" => array("Page" => "forum", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText("Forum"));
        $this->StaticItems[] = array("item_id" => "MenuItem1Item3", "item_id_parent" => "MenuItem1", "item_caption" => $CCSLocales->GetText("Portal"), "item_url" => array("Page" => "portal", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText("Portal"));
        $this->StaticItems[] = array("item_id" => "MenuItem1Item4", "item_id_parent" => "MenuItem1", "item_caption" => $CCSLocales->GetText("Registration"), "item_url" => array("Page" => "registrationform", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText("Registration"));
        $this->StaticItems[] = array("item_id" => "MenuItem1Item5", "item_id_parent" => "MenuItem1", "item_caption" => $CCSLocales->GetText("Task Manager"), "item_url" => array("Page" => "taskmanager", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText("Task Manager"));
        $this->StaticItems[] = array("item_id" => "MenuItem2", "item_id_parent" => null, "item_caption" => $CCSLocales->GetText("Projects"), "item_url" => array("Page" => "", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText("Projects"));
        $this->StaticItems[] = array("item_id" => "MenuItem2Item1", "item_id_parent" => "MenuItem2", "item_caption" => $CCSLocales->GetText("Tuition Center"), "item_url" => array("Page" => "tuition", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText("Tuition Center"));
        $this->StaticItems[] = array("item_id" => "MenuItem2Item2", "item_id_parent" => "MenuItem2", "item_caption" => $CCSLocales->GetText("Test"), "item_url" => array("Page" => "test", "Parameters" => null), "item_target" => "", "item_title" => $CCSLocales->GetText("Test"));

        $this->DataSource = new clsMenu1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->DataSource->SetProvider(array("DBLib" => "Array"));

        parent::clsMenu("item_id_parent", "item_id", null);

        $this->ItemLink = new clsControl(ccsLink, "ItemLink", "ItemLink", ccsText, "", CCGetRequestParam("ItemLink", ccsGet, NULL), $this);
        $this->controls["ItemLink"] = & $this->ItemLink;
        $this->ItemLink->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ItemLink->Page = "";
        $this->LinkStartParameters = $this->ItemLink->Parameters;
    }
//End Class_Initialize Event

//SetControlValues Method @2-B7BF812B
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $LinkUrl = $this->DataSource->f("item_url");
        $this->ItemLink->Page = $LinkUrl["Page"];
        $this->ItemLink->Parameters = $this->SetParamsFromDB($this->LinkStartParameters, $LinkUrl["Parameters"]);
    }
//End SetControlValues Method

//ShowAttributes @2-17684C76
    function ShowAttributes() {
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End Menu1 Class @2-FCB6E20C

//Menu1DataSource Class @2-201CC8D7
class clsMenu1DataSource extends DB_Adapter {
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;
    var $wp;
    var $Record = array();
    var $Index;
    var $FieldsList = array();

    function clsMenu1DataSource($parent) {
        $this->Parent = & $parent;
        $this->ErrorBlock = "Menu Menu1";
        $this->ItemLink = new clsField("ItemLink", ccsText, "");
        $this->FieldsList["ItemLink"] = & $this->ItemLink;
    }

    function Prepare()
    {
    }

    function Open()
    {
        $this->query($this->Parent->StaticItems);
    }

    function SetValues()
    {
        $this->ItemLink->SetDBValue($this->f("item_caption"));
    }
}
//End Menu1DataSource Class

//Initialize Page @1-98022F5F
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";
$TemplateSource = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "Index.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/menu/ccs-menu.js|";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-AE020F56
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Menu1 = new clsMenuMenu1("", $MainPage);
$MainPage->Menu1 = & $Menu1;
$ScriptIncludes = "";
$SList = explode("|", $Scripts);
foreach ($SList as $Script) {
    if ($Script != "") $ScriptIncludes = $ScriptIncludes . "<script src=\"" . $PathToRoot . $Script . "\" type=\"text/javascript\"></script>\n";
}
$Attributes->SetValue("scriptIncludes", $ScriptIncludes);

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-F98FCA33
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
if (strlen($TemplateSource)) {
    $Tpl->LoadTemplateFromStr($TemplateSource, $BlockToParse, "UTF-8", "replace");
} else {
    $Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "UTF-8", "replace");
}
$Tpl->SetVar("CCS_PathToRoot", $PathToRoot);
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "");
$Attributes->Show();
//End Initialize HTML Template

//Go to destination page @1-CEA9D96B
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    header("Location: " . $Redirect);
    unset($Menu1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2C02763D
$Menu1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$main_block = CCConvertEncoding($main_block, $FileEncoding, $CCSLocales->GetFormatInfo("Encoding"));
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-8E368955
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
unset($Menu1);
unset($Tpl);
//End Unload Page


?>
